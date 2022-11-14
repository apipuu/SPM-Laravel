<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_peminjaman;
use App\Models\data_keanggotaan;
use App\Models\Buku;

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
            $Data_peminjaman = data_peminjaman::all();
            return datatables()->of($Data_peminjaman)
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
        $request->validate([
            'NIK' => 'required',
            'kode_buku' => 'required',
            'nama_buku' => 'required',
            'status' => 'required'
        ]);
        $array = $request->only([
            'NIK',
            'kode_buku' ,
            'nama_buku' ,
            'status' => 'required'
        ]);
        if (data_keanggotaan::where('NIK', '=', Input::get('NIK'))->exists()) {
            // user 
        }
        $Data_peminjaman = data_peminjaman::create($array);
        
        return redirect()->route('data_peminjaman.index')
            ->with('success_message', 'Berhasil menambah transaksi');
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
        //
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
