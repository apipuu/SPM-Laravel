@extends('adminlte::page')

@section('title', 'Edit Anggota')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Anggota</h1>
@stop

@section('content')
    <form action="{{route('data_keanggotaan.update', $data_keanggotaan)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                   <div class="form-group">
                        <label for="exampleInputName">NIK</label>
                        <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="exampleInputName" placeholder="NIK" name="NIK" value="{{$data_keanggotaan->NIK ?? old('NIK')}}" readonly>
                        @error('NIK') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Depan</label>
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="exampleInputName" placeholder="Nama Depan" name="nama_depan" value="{{$data_keanggotaan->nama_depan ?? old('nama_depan')}}">
                        @error('nama_depan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Belakang</label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="exampleInputName" placeholder="Nama Belakang" name="nama_belakang" value="{{$data_keanggotaan->nama_belakang ?? old('nama_belakang')}}">
                        @error('nama_belakang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="exampleInputName" placeholder="Pekerjaan" name="pekerjaan" value="{{$data_keanggotaan->pekerjaan ??old('pekerjaan')}}">
                        @error('pekerjaan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="exampleInputName" placeholder="Tempat Lahir" name="tempat_lahir" value="{{$data_keanggotaan->tempat_lahir ?? old('tempat_lahir')}}">
                        @error('tempat_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputName" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{$data_keanggotaan->tanggal_lahir ?? old('tanggal_lahir')}}">
                        @error('tanggal_lahir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputName" placeholder="Alamat" name="alamat" value="{{$data_keanggotaan->alamat ?? old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nomor Handphone</label>
                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="exampleInputName" placeholder="Nomor Handphone" name="no_hp" value="{{$data_keanggotaan->no_hp ?? old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleInputName" placeholder="Jenis_kelamin" name="jenis_kelamin" value="{{$data_keanggotaan->jenis_kelamin ?? old('jenis_kelamin')}}">
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('data_keanggotaan.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop