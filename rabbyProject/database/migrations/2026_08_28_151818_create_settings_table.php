<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Logo image path
            $table->string('logo')->nullable();

            // Long headline
            $table->text('headline')->nullable();

            $table->text('address')->nullable();

            $table->string('mobile')->nullable();

            $table->text('footer_text')->nullable();

            $table->string('fb_link')->nullable();

            $table->string('email')->nullable();

            $table->string('website_link')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};