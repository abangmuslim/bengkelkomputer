<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;



class PetugasController extends Controller
{
    //
    public function index()
    {
        return view('petugas.index',[
            "title"=>"Data Petugas",
            "data"=>Petugas::all()
        ]);
    }
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);

        Petugas::create($request->all());

        return redirect()->route('petugas.index')->with('success','Data Petugas Berhasil Ditambahkan');
    }
}