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

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jenis Buku</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($buku as $key => $buku)
                            <tr>
                                <td>{{$buku->kode_buku}}</td>
                                <td>{{$buku->nama_buku}}</td>
                                <td>{{$buku->jumlah_buku}}</td>
                                <td>{{$buku->penulis}}</td>
                                <td>{{$buku->penerbit}}</td>
                                <td>{{$buku->jenis_buku}}</td>
                                <td>{{$buku->status}}</td>

                                <td>
                                    <a href="{{route('buku.edit', $buku)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('buku.destroy', $buku)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
