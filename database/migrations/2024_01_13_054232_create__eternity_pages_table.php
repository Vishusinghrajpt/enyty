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
        Schema::create('eternity_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnDelete();
            $table->string('frist_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('symbolic')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('additional_picture')->nullable();
            $table->string('connection')->nullable();
            $table->string('slug')->nullable();
            $table->string('QrPath')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eternity_pages');
    }
};
