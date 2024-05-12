@extends('layouts.template')
@section('judulh1','Admin - Layanan')

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
            <h3 class="card-title">Ubah Data Layanan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('layanan.update',$layanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$layanan->nama}}">
                </div>  
                <div class="form-group">
                  <label for="jeniskategori">Jeniskategori</label>
                  <select class="custom-select" id="jeniskategori" name="jeniskategori">
                  <option value="{{$layanan->jeniskategori}}" selected> {{$layanan->jeniskategori}} </option> 
                    <option value="Hardware">Hardware</option>
                    <option value="Software">Software</option>
                  </select>
                </div>                
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <select class="custom-select" id="deskripsi" name="deskripsi">
                  <option value="{{$layanan->deskripsi}}" selected> {{$layanan->deskripsi}} </option> 
                    <option value="Reparasi">Reparasi</option>
                    <option value="Instal">Instal</option>
                    <option value="Jual">Jual</option>
                    <option value="Beli">Beli</option>
                    <option value="Sewa">Sewa</option>
                  </select>
                </div>                     
                
                <div class="form-group">
                    <label>Suplier</label>
                    <select class="form-control" name="suplier_id">
                        @foreach($suplier as $dt )
                        <option value="{{ $dt->id }}" @if($dt->id===$layanan->suplier_id) selected
                            @endif>{{ $dt->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Teknisi</label>
                    <select class="form-control" name="teknisi_id">
                        @foreach($teknisi as $dt )
                        <option value="{{ $dt->id }}" @if($dt->id===$layanan->teknisi_id) selected
                            @endif>{{ $dt->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{$layanan->stock}}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{$layanan->harga}}">
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
