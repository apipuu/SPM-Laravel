<?php

namespace App\Http\Controllers;
use App\Models\data_laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $laporan = data_laporan::all();
            return datatables()->of($laporan)
                ->addColumn('action', function ($row) {
                    $html = '<a href=' . ' class="btn btn-primary btn-small">Detail</a>';
                    return $html;
                })
                ->toJson();
        }
        return view('laporan/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
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
            'nama',
            'isi_laporan',  
            'tanggal_dibuat',
        ]);

        $array['NIK'] = DB::table('users')->where('name', $request['nama'])->value('NIK');
        $array['tanggal_dibuat'] = now();

        $data_laporan = data_laporan::create($array);
        return redirect()->route('laporan.create')
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
