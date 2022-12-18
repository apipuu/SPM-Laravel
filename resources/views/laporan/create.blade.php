@extends('adminlte::page')

@section('title', 'Laporan Keluhan')

@section('content_header')
    <h1 class="m-0 text-dark">Laporkan Masalah</h1>
@stop

@section('content')

    <form action="{{ route('laporan.store') }}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Username</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName" placeholder="Username" name="nama" value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Laporkan masalah anda</label>
                        <textarea type="text" class="form-control" rows="7" @error('isi_laporan') is-invalid @enderror" id="exampleInputName" placeholder="Ketikan masalah anda" name="isi_laporan" value="{{old('isi_laporan')}}" ></textarea>
                        @error('isi_laporan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('laporan.create')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop