@extends('adminlte::page')

@section('title', 'Daftar Peminjaman Buku')

@section('content_header')
    <h1 class="m-0 text-dark">Daftar Peminjaman Buku</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="peminjaman">
                        <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Tanggal Dipinjam</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Status</th>
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
    <form action="" id="selesai-form" method="post">
        @method('patch')
        @csrf
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        var table = $('#peminjaman').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [
                        {data: 'NIK', name: 'NIK'},
                        {data: 'kode_buku', name: 'kode_buku'},
                        {data: 'nama_buku', name: 'nama_buku'},
                        {data: 'tanggal_dipinjam', name: 'tanggal_dipinjam'},
                        {data: 'tanggal_dikembalikan', name: 'tanggal_dikembalikan'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action'},
                    ]
                });
    </script>
@endpush