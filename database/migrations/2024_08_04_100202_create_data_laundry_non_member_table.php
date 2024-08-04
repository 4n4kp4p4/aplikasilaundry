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
        Schema::create('data_laundry_non_member', function (Blueprint $table) {
            $table->unsignedBigInteger('no_transaksi')->autoIncrement()->unique();
            $table->date('tgl_transaksi');
            $table->string('nama_customer');
            $table->text('alamat_customer');
            $table->string('no_telp');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->text('keterangan');
            $table->enum('status_laundry', ['Menunggu', 'Diproses', 'Selesai']);
            $table->enum('status_pembayaran', ['Bayar', 'Belum']);
            $table->text('lokasi_kirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_laundry_non_member');
    }
};
