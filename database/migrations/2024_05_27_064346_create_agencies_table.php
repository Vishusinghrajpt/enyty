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
    Schema::create('agencies', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained("users")->cascadeOnDelete();
        $table->string('number');
        $table->string('vat_number');
        $table->string('eternity_cod');
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencies');
    }
};
