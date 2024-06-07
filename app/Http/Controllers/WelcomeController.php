<?php

namespace App\Http\Controllers;

use App\Models\Detiltransaksi;
use App\Models\Suplier;
use App\Models\Teknisi;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $suplier = Suplier::count();
        $teknisi = Teknisi::count();
        $layanan = Layanan::count();
        $layanan2 = Layanan::count('jeniskategori');
        $pelanggan = Pelanggan::count();
        $user = User::count();
        $datatransaksi1 = Transaksi::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_transaksi = detiltransaksi::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('jumlah');

            $pendapatan = $total_transaksi;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        return view('welcome',[
            "suplier"=>$suplier,
            "pelanggan"=> $pelanggan,
            "teknisi"=>$teknisi,
            "layanan"=> $layanan,
            "layanan2"=> $layanan2,
            "pendapatan"=> $pendapatan,
            "user"=> $user,
            "datatransaksi" => Transaksi::paginate(5),
            "title"=>"welcome"
        ]);
        
    }

    
}
