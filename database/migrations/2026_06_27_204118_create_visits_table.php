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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('day')->index();
            $table->string('visitor_id', 64);  // sha1(app_key|ip|user_agent) — анонімний відбиток, не PII
            $table->string('path', 191)->default('/');
            $table->unsignedInteger('hits')->default(1);
            $table->timestamps();

            // один рядок на (день, відвідувач, сторінка) — рахуємо унікальних і перегляди
            $table->unique(['day', 'visitor_id', 'path']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
