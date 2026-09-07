<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_perusahaan', function (Blueprint $table) {
            $table->id('id_profil');
            $table->foreignId('id_admin')->constrained('admin', 'id_admin')->onDelete('cascade');
            $table->string('nama_perusahaan', 100);
            $table->text('tentang_perusahaan');
            $table->string('alamat', 200);
            $table->string('telepon', 20);
            $table->string('jam_operasional', 100);
            $table->text('maps_embed')->nullable();
            $table->string('logo', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_perusahaan');
    }
};
