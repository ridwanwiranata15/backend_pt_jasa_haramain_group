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
        Schema::create('price_list_hotels', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_hotel');
            $table->string('tipe_kamar');
            $table->decimal('harga', 15, 2);
             $table->date('tanggal_checkout')->nullable();
            $table->text('catatan')->nullable();
            $table->text('add_on')->nullable();
            $table->string('supplier_utama')->nullable();
            $table->string('kontak_supplier_utama')->nullable();
            $table->string('supplier_cadangan')->nullable();
            $table->string('kontak_supplier_cadangan')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_list_hotels');
    }
};
