<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductModelNumberTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_model_number', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('model_number_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'model_number_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_model_number');
    }
}
