@extends('adminlte::page')

@section('title', 'List Laporan Keluhan')

@section('content_header')
    <h1 class="m-0 text-dark">List Laporan Keluhan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="laporan">
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>Nama Pelapor</th>
                            <th>Isi Laporan</th>
                        </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        var table = $('#laporan').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [

                        {data: 'tanggal_dibuat', name: 'tanggal_dibuat'},
                        {data: 'NIK', name: 'NIK'},
                        {data: 'nama', name: 'nama'},
                        {data: 'isi_laporan', name: 'isi_laporan'},
                    ]
                });
    </script>
@endpush
