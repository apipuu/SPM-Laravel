<?php

namespace App\Http\Controllers;
use App\Models\data_laporan;
use Illuminate\Http\Request;


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
                    $html = '<a href=' . route('laporan.detail', $row) . ' class="btn btn-primary btn-small">Detail</a>';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function detail($id)
    {
        $laporan = data_laporan::find($id);
        if (!$laporan) return redirect()->route('laporan.index')
            ->with('error_message', 'Laporan dengan id '.$id.' tidak ditemukan');
        return view('laporan.detail', [
            'laporan' => $laporan
        ]);
    }
}
