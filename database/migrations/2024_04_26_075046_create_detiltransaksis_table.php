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
        Schema::create('detiltransaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_id')->unsigned();
            $table->bigInteger('layanan_id')->unsigned();
            $table->integer('jumlah');
            $table->double('harga');
            $table->timestamps();
        });

        
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        

    }

};
