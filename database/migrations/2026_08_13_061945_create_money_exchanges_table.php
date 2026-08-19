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
        Schema::create('money_exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('tipe', ['tamis', 'tumis']); // tamis = rupiah -> reyal, tumis = reyal -> rupiah
            $table->decimal('jumlah_input', 15, 2);   // jumlah rupiah atau reyal
            $table->decimal('kurs', 15, 2);           // kurs input admin
            $table->decimal('hasil', 15, 2);          // hasil konversi
            $table->enum('status', ['nego', 'deal', 'batal', 'tahap persiapan', 'tahap produksi', 'done'])->default('nego');
            $table->date('tanggal_penyerahan');
            $table->string('supplier')->nullable();
            $table->string('harga_dasar')->nullable();
            $table->string('harga_jual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_exchanges');
    }
};
