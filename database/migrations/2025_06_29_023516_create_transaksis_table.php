<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
         $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        $table->foreignId('obat_id')->constrained()->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('total_harga', 10, 2);
        $table->timestamp('tanggal_transaksi')->useCurrent();
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
