<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotProductGradeTable extends Migration
{
    public function up()
    {
        Schema::create('pivot_product_grade', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('grade_id')->constrained()->onDelete('cascade');
            $table->primary(['product_id', 'grade_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pivot_product_grade');
    }
}
