<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_peminjaman;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $peminjaman = data_peminjaman::all();
            return 
                datatables()->of($peminjaman)
                ->addColumn('action', function ($row) {
                    if($row['status'] === 'Sedang Dipinjam') $html = '<a href=' . route('data-peminjaman.edit', $row) . ' class="btn btn-warning btn-xs">Kembalikan</a>';
                    else $html = '<a href=' . '#'. ' class="btn btn-primary btn-xs">Dikembalikan</a>';
                    return $html;
                })
                ->toJson();
        }
        return view('data_peminjaman/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->only([
            'NIK',
            'kode_buku',
            'nama_buku',  
            'tanggal_dipinjam',
            'tanggal_dikembalikan',
            'status'
        ]);

        $array['nama_buku'] = DB::table('buku')->where('kode_buku', $request['kode_buku'])->value('nama_buku');
        $array['tanggal_dipinjam'] = now();
        $tanggal_sekarang = now();
        $array['tanggal_dikembalikan'] =  $tanggal_sekarang->addDays(7);
        $array['status'] = 'Sedang Dipinjam';
        $jumlah_buku = DB::table('buku')->where('kode_buku', $array['kode_buku'])->value('jumlah_buku');
        
        if($jumlah_buku == 0) return redirect()->route('data-peminjaman.create')->with('failed_message', 'Buku Tidak Tersedia');
        if($jumlah_buku == 1) DB::table('buku')->where('kode_buku', $array['kode_buku'])->update(['status'=> 'Tidak Tersedia'], ['jumlah_buku' => 0]);
        if($jumlah_buku > 1) DB::table('buku')->where('kode_buku', $array['kode_buku'])->update(['jumlah_buku' => $jumlah_buku - 1]);
        
        $peminjaman = data_peminjaman::create($array);
        return redirect()->route('data-peminjaman.create')
            ->with('success_message', 'Berhasil menambah data buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = data_peminjaman::find($id);
        $peminjaman->status = 'Dikembalikan';
        $peminjaman->save();
        $jumlah_buku = DB::table('buku')->where('kode_buku', $peminjaman->kode_buku)->value('jumlah_buku'); 
        DB::table('buku')->where('kode_buku', $peminjaman->kode_buku)->update(['jumlah_buku'=> $jumlah_buku+1]);
        if($jumlah_buku == 0) DB::table('buku')->where('kode_buku', $peminjaman->kode_buku)->update(['status'=> 'Tersedia']);
        return redirect()->route('data-peminjaman.index')
            ->with('success_message', 'Berhasil mengubah data buku');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
