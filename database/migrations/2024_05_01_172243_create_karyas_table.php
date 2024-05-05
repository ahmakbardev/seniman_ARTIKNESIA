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
        Schema::create('karyas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->json('images')->nullable();
            $table->integer('size_x')->nullable();
            $table->integer('size_y')->nullable();
            $table->decimal('weight', 8)->nullable();
            $table->string('material')->nullable();
            $table->text('philosophy')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('category_id')->constrained('subkategoris'); // Mengubah ke 'subkategoris'
            $table->string('status')->nullable();
            $table->text('messages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};
