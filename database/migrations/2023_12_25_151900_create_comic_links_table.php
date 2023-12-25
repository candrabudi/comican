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
        Schema::create('comic_links', function (Blueprint $table) {
            $table->id();
            $table->integer('comic_id');
            $table->enum('web', ['kiryuu']);
            $table->text('comic_link');
            $table->datetime('last_update')->nullable();
            $table->datetime('next_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_links');
    }
};
