@extends('layouts.template')
@section('judulh1','Admin - Suplier')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Suplier</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('suplier.update',$suplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Suplier</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{$suplier->nama}}">
                </div>                
                <div class="form-group">
                    <label for="tanggalmou">Tgl MOU</label>
                    <input type="date" class="form-control" id="tanggalmou" name="tanggalmou" value="{{$suplier->tanggalmou}}">
                </div>
                <div class="form-group">
                    <label for="hp">No HP</label>
                    <input type="text" class="form-control" id="hp" name="hp" value="{{$suplier->hp}}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$suplier->alamat}}">
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Ubah</button>
            </div>
        </form>
    </div>

</div>

@endsection




