
<style>
    table{
        width:100%;
        border-collapse:"collapse";
    }
    table tr td, table tr th{
        font-size: 9pt;
        border:1px solid;
    }
    .centered {
        text-align:center;
    }
    td{
        padding-left:10px;
    }
    h1{
        text-align:center;
    }
</style>
<h1>
    DATA BUKU PERPUSTAKAAN
</h1>
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
                        @foreach($data_buku as $key => $buku)
                            <tr>
                                <td>{{$buku->kode_buku}}</td>
                                <td>{{$buku->nama_buku}}</td>
                                <td>{{$buku->jumlah_buku}}</td>
                                <td>{{$buku->penulis}}</td>
                                <td>{{$buku->penerbit}}</td>
                                <td>{{$buku->jenis_buku}}</td>
                                <td>{{$buku->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
</table>

