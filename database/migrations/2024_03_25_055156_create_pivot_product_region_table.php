<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductRegionTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_region', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'region_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_region');
    }
}
