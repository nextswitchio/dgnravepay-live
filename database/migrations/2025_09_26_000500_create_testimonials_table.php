<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('testimonials', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('content');
      $table->unsignedTinyInteger('rating')->default(5); // 1-5
      $table->string('avatar_path')->nullable();
      $table->string('variant')->default('white'); // white | yellow
      $table->string('icon')->nullable(); // play | bag | instagram | facebook | null
      $table->boolean('is_featured')->default(false);
      $table->boolean('is_published')->default(true);
      $table->integer('sort_order')->default(0);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('testimonials');
  }
};
