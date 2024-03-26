<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductCarrierTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_carrier', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('carrier_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'carrier_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_carrier');
    }
}
