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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('authors')->onCascade('delete');
            $table->foreign('book_id')->references('id')->on('books')->onCascade('delete');
            $table->float('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
