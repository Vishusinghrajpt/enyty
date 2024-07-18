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
            $table->unsignedBigInteger('poster_id')->nullable();

            $table->foreign('poster_id')
                  ->references('id')
                  ->on('posters')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eternity_pages', function (Blueprint $table) {
            $table->dropForeign(['poster_id']);
            $table->dropColumn('poster_id');
        });
    }
};
