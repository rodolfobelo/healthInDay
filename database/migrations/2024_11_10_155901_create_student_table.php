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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('matricula')->unique();
            $table->bigInteger("id_users")->nullable();
            $table->timestamps();

            $table->foreign('id_users')->references('id')
                ->on('users');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropForeign('id_users');
        Schema::dropIfExists('students');
    }
};
