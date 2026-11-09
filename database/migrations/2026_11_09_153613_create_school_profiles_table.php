<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->longText('sejarah')->nullable();
            $table->string('akreditasi')->nullable();
            $table->longText('struktur_organisasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
