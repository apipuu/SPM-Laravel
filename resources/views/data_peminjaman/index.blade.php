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

                    <a href="{{route('data_peminjaman.create')}}" class="btn btn-primary mb-2">
                        Buat Pinjaman
                    </a>
                     <!-- <a href="data_keanggotaan/cetakdatakeanggotaan" class="btn btn-primary mb-2" target="_blank">
                        Cetak Data
                    </a> -->

                    <table class="table table-hover table-bordered table-stripped" id="data_peminjaman">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Status</th>
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

        var table = $('#data_peminjaman').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"asc"]],
                    columns: [
                        {data: 'NIK', name: 'NIK'},
                        {data: 'kode_buku', name: 'kode_buku'},
                        {data: 'nama_buku', name: 'nama_buku'},
                        {data: 'status', name: 'status'},
                    ]
                });

    </script>
@endpush