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
        Schema::create('transportation_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('transportation_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('tour_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date("tanggal_keberangkatan");
            $table->string('supplier')->nullable();
            $table->string('harga_dasar')->nullable();
            $table->string('harga_jual')->nullable();
            $table->enum('status', ['nego', 'deal', 'batal', 'tahap persiapan', 'tahap produksi', 'done'])->default('nego');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_orders');
    }
};
