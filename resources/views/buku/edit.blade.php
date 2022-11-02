@extends('adminlte::page')

@section('title', 'Edit Data Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Buku</h1>
@stop

@section('content')
    <form action="{{route('buku.update', $buku)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputName">Kode Buku</label>
                            <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" id="exampleInputName" placeholder="Kode Buku" name="kode_buku" value="{{$buku->kode_buku ?? old('kode_buku')}}">
                            @error('kode_buku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Nama Buku</label>
                            <input type="text" class="form-control @error('nama_buku') is-invalid @enderror" id="exampleInputName" placeholder="Nama Buku" name="nama_buku" value="{{$buku->nama_buku ?? old('nama_buku')}}">
                            @error('nama_buku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Jumlah Buku</label>
                            <input type="text" class="form-control @error('jumlah_buku') is-invalid @enderror" id="exampleInputName" placeholder="Jumlah Buku" name="jumlah_buku" value="{{$buku->jumlah_buku??old('jumlah_buku')}}">
                            @error('jumlah_buku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Penulis</label>
                            <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="exampleInputName" placeholder="Nama Penulis" name="penulis" value="{{$buku->penulis ?? old('penulis')}}">
                            @error('penulis') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Penerbit</label>
                            <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="exampleInputName" placeholder="Penerbit" name="penerbit" value="{{$buku->penerbit??old('penerbit')}}">
                            @error('penerbit') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputName">Jenis Buku</label>
                            <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" id="exampleInputName" placeholder="Jenis Buku" name="jenis_buku" value="{{$buku->jenis_buku??old('jenis_buku')}}">
                            @error('jenis_buku') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" id="exampleInputName" placeholder="Status" name="status" value="{{$buku->status??old('status')}}">
                            @error('status') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('buku.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
@stop
