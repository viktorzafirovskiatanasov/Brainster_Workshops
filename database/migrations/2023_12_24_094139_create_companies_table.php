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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('logo');
            $table->string('website');
            $table->unsignedInteger('country_id');
            $table->timestamps();
            
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**bnmbnmbnmbnmbnmbmbnm
     * Reverse the migrations.nmbnmbnmsdsdfsdfsfsdwerwerwrwerwerwer
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
