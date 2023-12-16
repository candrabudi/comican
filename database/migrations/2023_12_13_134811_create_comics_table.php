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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('alternative');
            $table->string('slug');
            $table->enum('status', ['ongoing', 'completed', 'hiatus']);
            $table->enum('type', ['Manga', 'Manhwa', 'Manhua'])->default('Manga');
            $table->enum('color', ['Yes', 'No'])->default('No');
            $table->enum('slider', ['Yes', 'No'])->default('No');
            $table->enum('hot', ['Yes', 'No'])->default('No');
            $table->text('description');
            $table->string('serialization');
            $table->string('author');
            $table->string('artist');
            $table->date('posted_on');
            $table->date('updated_on');
            $table->integer('released');
            $table->double('rating');
            $table->string('thumb');
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
