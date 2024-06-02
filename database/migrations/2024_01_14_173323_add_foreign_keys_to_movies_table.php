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
        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('rating_id')->constrained();
            $table->foreignId('type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            // $table->dropForeign('rating_id');
            // $table->dropColumn('rating_id');
            // $table->dropForeign('type_id');
            // $table->dropColumn('type_id');

            $table->dropConstrainedForeignId('rating_id');
            $table->dropConstrainedForeignId('type_id');
        });
    }
};
