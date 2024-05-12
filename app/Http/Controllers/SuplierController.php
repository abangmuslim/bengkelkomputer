<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SuplierController extends Controller
{
    //
    public function index()
    {
        return view('suplier.index', [
            "title" => "Suplier",
            "data" => Suplier::all()
        ]);
    }    
    public function create():View
    {
        return view('suplier.index')->with(["title" => "Tambah Data Suplier"]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "tanggalmou"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);

        Suplier::create($request->all());
        return redirect()->route('suplier.index')->with('success','Data Suplier Berhasil Ditambahkan');
    }

    public function edit(Suplier $suplier):View
    {
        return view('suplier.editsuplier',compact('suplier'))->with([
            "title" => "Ubah Data Suplier",
        ]);
    }
    public function update(Suplier $suplier, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "tanggalmou"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);

        $suplier->update($request->all());
        return redirect()->route('suplier.index')->with('updated','Data Suplier Berhasil Diubah');
    }

}



