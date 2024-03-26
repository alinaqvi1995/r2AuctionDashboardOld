<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductColorTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_color', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'color_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_color');
    }
}
