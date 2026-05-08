<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('headline')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('resume_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
