<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('business_settings', static function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->enum('data_type', ['text', 'textarea', 'numeric', 'double', 'file', 'bool', 'date'])->default('text');
            $table->text('dev_value')->nullable();
            $table->text('prod_value')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};
