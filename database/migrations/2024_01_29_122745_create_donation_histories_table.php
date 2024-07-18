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
        Schema::create('donation_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnDelete();
            $table->string('donationId')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('fullName')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->string('paymentDetails')->nullable();
            $table->string('receipt_url')->nullable();
            $table->string('currency')->nullable();
            $table->date('donationDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_histories');
    }
};
