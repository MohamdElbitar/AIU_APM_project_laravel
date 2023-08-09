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
        Schema::create('course_efforts', function (Blueprint $table) {
            $table->id();
            $table->string('c_code');
            $table->year('year');
            $table->string('semester');
            $table->foreign('c_code')->references('code')->on('courses')->cascadeOnDelete();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_efforts');
    }
};
