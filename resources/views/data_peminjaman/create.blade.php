@extends('adminlte::page')

@section('title', 'Buat Transaksi')

@section('content_header')
    <h1 class="m-0 text-dark">Buat Transaksi</h1>
@stop

@section('content')
    <form action="{{route('data-peminjaman.store')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputName">NIK</label>
                        <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="exampleInputName" placeholder="NIK" name="NIK" value="{{old('NIK')}}">
                        @error('NIK') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Kode Buku</label>
                        <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" id="exampleInputName" placeholder="kode buku" name="kode_buku" value="{{old('kode_buku')}}">
                        @error('kode_buku') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                    <a href="{{route('data-peminjaman.create')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop