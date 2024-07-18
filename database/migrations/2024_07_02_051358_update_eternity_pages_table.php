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
        Schema::table('eternity_pages', function (Blueprint $table) {
            $table->string('biography',1500)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eternity_pages', function (Blueprint $table) {
            // If you need to revert the change, define how to do it here
            $table->string('biography',255)->nullable()->change();
        });
    }
};
