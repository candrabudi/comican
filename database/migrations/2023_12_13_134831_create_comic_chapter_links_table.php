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
        Schema::create('comic_chapter_links', function (Blueprint $table) {
            $table->id();
            $table->integer('comic_id');
            $table->string('chapter');
            $table->string('link');
            $table->tinyInteger('status');
            $table->dateTime('chapter_realease');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_chapter_links');
    }
};
