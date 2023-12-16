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
        Schema::create('comic_chapters', function (Blueprint $table) {
            $table->id();
            $table->integer('comic_id');
            $table->string('chapter_number');
            $table->string('chapter_slug');
            $table->string('chapter_title');
            $table->text('chapter_content');
            $table->dateTime('chapter_realease');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_chapters');
    }
};
