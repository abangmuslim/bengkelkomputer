<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::table('layanans',function(Blueprint $table){
            $table->foreign('suplier_id')->references('id')->on('supliers')
            ->onUpdate('cascade')->onDelete('cascade');            
        });
        Schema::table('layanans',function(Blueprint $table){
            $table->foreign('teknisi_id')->references('id')->on('teknisis')
            ->onUpdate('cascade')->onDelete('cascade');            
        });



        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('Users')
                ->onUpdate('cascade')->onDelete('cascade');
        });




        Schema::table('detiltransaksis', function (Blueprint $table) {

            $table->foreign('transaksi_id')->references('id')->on('transaksis')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('layanan_id')->references('id')->on('layanans')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('layanans', function(Blueprint $table) {
            $table->dropForeign('layanans_suplier_id_foreign');
        });

        Schema::table('layanans', function(Blueprint $table) {
            $table->dropIndex('layanans_suplier_id_foreign');
        });
        Schema::table('layanans', function(Blueprint $table) {
            $table->dropForeign('layanans_teknisi_id_foreign');
        });

        Schema::table('layanans', function(Blueprint $table) {
            $table->dropIndex('layanans_teknisi_id_foreign');
        });

        Schema::dropIfExists('layanans');


        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksi_pelanggan_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksi_pelanggan_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksi_user_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksi_user_id_foreign');
        });

        Schema::dropIfExists('transaksis');





        Schema::table('detiltransaksis', function (Blueprint $table) {
            $table->dropForeign('detiltransaksi_transaksi_id_foreign');
        });

        Schema::table('detiltransaksis', function (Blueprint $table) {
            $table->dropIndex('detiltransaksi_transaksi_id_foreign');
        });

        Schema::table('detiltransaksis', function (Blueprint $table) {
            $table->dropForeign('detiltransaksi_layanan_id_foreign');
        });

        Schema::table('detiltransaksis', function (Blueprint $table) {
            $table->dropIndex('detiltransaksi_layanan_id_foreign');
        });

        Schema::dropIfExists('detiltransaksis');
    }
};

