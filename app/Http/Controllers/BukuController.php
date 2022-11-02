<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', [
            'buku' => $buku
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'jumlah_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jenis_buku' => 'required',
            'status' => 'required'
        ]);
        $array = $request->only([
            'kode_buku',
            'nama_buku',
            'jumlah_buku',
            'penulis',
            'penerbit',
            'jenis_buku',
            'status'
        ]);
        $buku = Buku::create($array);
        return redirect()->route('buku.index')
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
        $buku = Buku::find($id);
        if (!$buku) return redirect()->route('buku.index')
            ->with('error_message', 'Buku dengan id '.$id.' tidak ditemukan');
        return view('buku.edit', [
            'buku' => $buku
        ]);
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
        $request->validate([
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'jumlah_buku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'jenis_buku' => 'required',
            'status' => 'required',
        ]);
        $buku = Buku::find($id);
        $buku->kode_buku = $request->kode_buku;
        $buku->nama_buku = $request->nama_buku;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->jenis_buku = $request->jenis_buku;
        $buku->status = $request->status;

        $buku->save();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil mengubah data buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $buku = Buku::find($id);
        if ($buku) $buku->delete();
        return redirect()->route('buku.index')
            ->with('success_message', 'Berhasil menghapus data buku');
    }
}
