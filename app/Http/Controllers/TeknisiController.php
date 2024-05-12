<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teknisi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeknisiController extends Controller
{
    //
    public function index()
    {
        return view('teknisi.index', [
            "title" => "Teknisi",
            "data" => Teknisi::all()
        ]);
    }    
    public function create():View
    {
        return view('teknisi.index')->with(["title" => "Tambah Data Teknisi"]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);

        Teknisi::create($request->all());
        return redirect()->route('teknisi.index')->with('success','Data Teknisi Berhasil Ditambahkan');
    }

    public function edit(Teknisi $teknisi):View
    {
        return view('teknisi.editteknisi',compact('teknisi'))->with([
            "title" => "Ubah Data Teknisi",
        ]);
    }
    public function update(Teknisi $teknisi, Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);

        $teknisi->update($request->all());
        return redirect()->route('teknisi.index')->with('updated','Data Teknisi Berhasil Diubah');
    }


}


