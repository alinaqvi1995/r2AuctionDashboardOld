<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductLockStatusTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_lock_status', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('lock_status_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'lock_status_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_lock_status');
    }
}
