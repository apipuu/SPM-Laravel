@extends('adminlte::page')

@section('title', 'List Data Buku')

@section('content_header')
    <h1 class="m-0 text-dark">List Data Buku</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('buku.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <a href="buku/cetakdatabuku" class="btn btn-primary mb-2" target="_blank">
                        Cetak Data
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="buku">
                        <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jenis Buku</th>
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
        var table = $('#buku').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [

                        {data: 'kode_buku', name: 'kode_buku'},
                        {data: 'nama_buku', name: 'nama_buku'},
                        {data: 'jumlah_buku', name: 'jumlah_buku'},
                        {data: 'penulis', name: 'penulis'},
                        {data: 'penerbit', name: 'penerbit'},
                        {data: 'jenis_buku', name: 'jenis_buku'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action'},
                    ]
                });
    </script>
@endpush
