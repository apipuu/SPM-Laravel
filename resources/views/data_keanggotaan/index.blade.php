@extends('adminlte::page')

@section('title', 'List Anggota Perpustakaan')

@section('content_header')
    <h1 class="m-0 text-dark">Daftar Anggota Perpustakaan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('data_keanggotaan.create')}}" class="btn btn-primary mb-2">
                        Tambah Anggota
                    </a>
                     <a href="data_keanggotaan/cetakdatakeanggotaan" class="btn btn-primary mb-2" target="_blank">
                        Cetak Data
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Pekerjaan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nomor Handphone</th>
                            <th>Jenis Kelamin</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data_keanggotaan as $key => $data_keanggotaan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data_keanggotaan->NIK}}</td>
                                <td>{{$data_keanggotaan->nama_depan}}</td>
                                <td>{{$data_keanggotaan->nama_belakang}}</td>
                                <td>{{$data_keanggotaan->pekerjaan}}</td>
                                <td>{{$data_keanggotaan->tempat_lahir}}</td>
                                <td>{{$data_keanggotaan->tanggal_lahir}}</td>
                                <td>{{$data_keanggotaan->alamat}}</td>
                                <td>{{$data_keanggotaan->no_hp}}</td>
                                <td>{{$data_keanggotaan->jenis_kelamin}}</td>
                                <td>
                                    <a href="{{ route('data_keanggotaan.edit', $data_keanggotaan) }}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{ route('data_keanggotaan.destroy', $data_keanggotaan) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush