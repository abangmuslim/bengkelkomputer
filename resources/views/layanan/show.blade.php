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

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Layanan</h3>
        </div>
        <!-- /.card-header -->


        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama Layanan</th>
                    <td>:</td>
                    <td>{{ $data[0]->nama }}</td>
                </tr>
                <tr>
                    <th>jeniskategori</th>
                    <td>:</td>
                    <td>{{ $data[0]->jeniskategori }}</td>
                </tr>
                <tr>
                    <th>Suplier</th>
                    <td>:</td>
                    <td>{{ $data[0]->suplier }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>:</td>
                   
                    <td>{{ $data[0]->deskripsi}}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>:</td>
                   
                    <td>{{ $data[0]->Stock}}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td>@money($data[0]->harga)</td>
                </tr>                
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</div>
@endsection
