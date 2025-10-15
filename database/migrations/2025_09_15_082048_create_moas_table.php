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
        Schema::create('moas', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('number_partner');
            $table->string('number_mou');
            $table->text('judul_moa');
            $table->integer('id_fakultas');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moas');
    }
};
