<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('value');
            $table->string('label')->nullable();
            $table->string('icon_class')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
