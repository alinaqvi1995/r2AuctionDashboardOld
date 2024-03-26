<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductCapacityTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_capacity', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('capacity_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'capacity_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_capacity');
    }
}
