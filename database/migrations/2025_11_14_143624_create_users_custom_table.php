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
    Schema::create('users', function (Blueprint $table) {
        $table->id('id_user');
        $table->string('nama_pengguna');
        $table->string('email')->unique();
        $table->string('password');
        $table->unsignedBigInteger('id_role');
        $table->unsignedBigInteger('id_divisi');
        $table->timestamps();

        // Foreign Keys
        $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');
        $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_custom');
    }
};
