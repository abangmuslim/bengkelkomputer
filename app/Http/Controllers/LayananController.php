<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\suplier;
use App\Models\teknisi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class LayananController extends Controller
{
    //
    public function index()
    {
        $layanan=Layanan::all();
        return view('layanan.index',[
            "title"=>"Layanan",
            "data"=>$layanan
        ]);
    }
    public function create():View
    {
        return view('layanan.create')->with([
            "title" => "Tambah Data Layanan",
            "teknisi"=> teknisi::all(),
            "suplier"=> suplier::all()
    ]);
    }
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "jeniskategori"=>"nullable",
            "suplier_id"=>"required",
            "teknisi_id"=>"required",
            "deskripsi"=>"required",
            "stock"=>"required",
            "harga"=>"required",
        ]);
        
        Layanan::create($request->all());
        return redirect()->route('layanan.index')->with('success','Data Layanan Berhasil Ditambahkan');
    }
    public function edit(Layanan $layanan):View
    {
        return view('layanan.edit',compact('layanan'))->with([
            "title" => "Ubah Data Layanan",
            "teknisi"=> teknisi::all(),
            "suplier"=> suplier::all()
        ]);
    }
    public function update(Layanan $layanan, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "jeniskategori"=>"nullable",
            "suplier_id"=>"required",
            "teknisi_id"=>"required",
            "deskripsi"=>"required",
            "stock"=>"required",
            "harga"=>"required",
        ]);

        $layanan->update($request->all());
        return redirect()->route('layanan.index')->with('updated','Data Layanan Berhasil Diubah');
    }
    public function show():View
    {
        $layanan=Layanan::all();
        return view('layanan.show')->with([
            "title" => "Tampil Data Layanan",
            "data"=>$layanan
        ]);
    }
    public function destroy($id):RedirectResponse
    {
        
        Layanan::where('id',$id)->delete();
        return redirect()->route('layanan.index')->with('deleted','Data Layanan Berhasil Dihapus');
    }


}
