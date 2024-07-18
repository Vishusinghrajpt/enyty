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
        Schema::create('posters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnDelete();
            $table->string('frist_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('funeral_celebration')->nullable();
            $table->string('location_body')->nullable();
            $table->string('announces_passing')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); 
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null'); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posters');
    }
};
