<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('alamat');
            $table->string('whatsapp')->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->string('id_seniman')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('jenis_karya')->nullable();
            $table->integer('subkategori')->nullable();
            $table->foreignId('paket_id')->constrained('pakets');
            $table->string('deskripsi_diri')->nullable();
            $table->text('exhibition_experience')->nullable();
            $table->string('ss_pembayaran')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
