<?php

namespace App\Livewire;
use Exception;

use App\Models\Transaksi;
use App\Models\Detiltransaksi;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Transaksis extends Component
{
    public $total;
    public $transaksi_id;
    public $layanan_id;
    public $jumlah=1;
    public $uang;
    public $kembali;

    public function render()
    {
        $transaksi= Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();

        $this->total=$transaksi->total;
        $this->kembali=$this->uang-$this->total;
        return view('livewire.transaksis')
        ->with("data",$transaksi)
        ->with("datalayanan",Layanan::where('stock','>','0')->get())
        ->with("datadetiltransaksi",Detiltransaksi::where('transaksi_id','=',$transaksi->id)->get());
    }

    public function store()
    {
        $this->validate([
            
            'layanan_id'=>'required'
        ]);
        $transaksi= Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        $this->transaksi_id=$transaksi->id;
        $produk=Layanan::where('id','=',$this->layanan_id)->get();
        $harga=$produk[0]->harga;
        Detiltransaksi::create([
            'transaksi_id'=>$this->transaksi_id,
            'layanan_id'=>$this->layanan_id,
            'jumlah'=>$this->jumlah,
            'harga'=>$harga
        ]);
        
        
        $total=$transaksi->total;
        $total=$total+($harga*$this->jumlah);
        Transaksi::where('id','=',$this->transaksi_id)->update([
            'total'=>$total
        ]);
        $this->layanan_id=NULL;
        $this->jumlah=1;

    }

    public function delete($detiltransaksi_id)
    {
        $detiltransaksi=Detiltransaksi::find($detiltransaksi_id);
        $detiltransaksi->delete();

        //update total
        $detiltransaksi=Detiltransaksi::select('*')->where('transaksi_id','=',$this->transaksi_id)->get();
        $total =0;
        foreach ($detiltransaksi as $od){
            $total+=$od->jumlah*$od->harga;
        }
        
        try{
            Transaksi::where('id','=',$this->transaksi_id)->update([
                'total'=>$total
            ]);
        }catch(Exception $e){
            dd($e);
        }
    }
    
    public function receipt($id)
    {
        $detiltransaksi = Detiltransaksi::select('*')->where('transaksi_id','=', $id)->get();
        //dd ($detiltransaksi);
        foreach ($detiltransaksi as $od) {
            $stocklama = Layanan::select('stock')->where('id','=', $od->layanan_id)->sum('stock');
            $stock = $stocklama - $od->jumlah;
            try {
                Layanan::where('id','=', $od->layanan_id)->update([
                    'stock' => $stock
                ]);
            } catch (Exception $e) {
                dd($e);
            }
        }
        return Redirect::route('cetakReceipt')->with(['id' => $id]);

    }

}


