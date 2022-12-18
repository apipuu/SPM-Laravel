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

                    <table class="table table-hover table-bordered table-stripped" id="data_keanggotaan">
                        <thead>
                        <tr>
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

        var table = $('#data_keanggotaan').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"asc"]],
                    columns: [
                        {data: 'NIK', name: 'NIK'},
                        {data: 'nama_depan', name: 'nama_depan'},
                        {data: 'nama_belakang', name: 'nama_belakang'},
                        {data: 'pekerjaan', name: 'pekerjaan'},
                        {data: 'tempat_lahir', name: 'tempat_lahir'},
                        {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                        {data: 'alamat', name: 'alamat'},
                        {data: 'no_hp', name: 'no_hp'},
                        {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                        {data: 'action', name: 'action'},
                    ]
                });

    </script>
@endpush