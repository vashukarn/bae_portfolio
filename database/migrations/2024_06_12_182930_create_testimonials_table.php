<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('testimonials', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->boolean('status')->default(true);
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
