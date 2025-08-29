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
        //
        Schema::create('vods', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            // Foreign key to the users table 글 작성자에게 종속
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('VodFilepath')->nullable();
            $table->string('HLSlow')->nullable();
            $table->string('HLSmiddle')->nullable();
            $table->string('HLShigh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('vods');

    }
};
