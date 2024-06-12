<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->string('banner')->nullable();
            $table->string('instagram_reel_link')->nullable();
            $table->longText('files')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
