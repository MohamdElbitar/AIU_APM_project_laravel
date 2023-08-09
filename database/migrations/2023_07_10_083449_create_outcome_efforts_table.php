<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('outcome_efforts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('oid');
            $table->foreign('oid')
                  ->references('id')
                  ->on('outcomes')->onDelete('cascade');
            $table->unsignedBigInteger('ce_code');
            $table->foreign('ce_code')
                  ->references('id')
                  ->on('course_efforts')->onDelete('cascade');
                  $table->string('pname');
                  $table->string('c_code');
            $table->string('semester');
            $table->year('year');
            $table->string('abet_code');
            $table->double('p_num');
            $table->double('avg_num');


            $table->timestamps();



        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcome_efforts');
    }
};
