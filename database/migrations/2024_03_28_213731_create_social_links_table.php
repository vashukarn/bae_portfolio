<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('social_links', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_id')->constrained('socials')->cascadeOnUpdate();
            $table->morphs('entity');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
