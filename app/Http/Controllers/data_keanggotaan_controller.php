<?php

namespace App\Http\Controllers;
use App\Models\data_keanggotaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class data_keanggotaan_controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data_keanggotaan = data_keanggotaan::all();
            return datatables()->of($data_keanggotaan)
                ->addColumn('action', function ($row) {
                    $html = '<a href=' . route('data_keanggotaan.edit', $row) . ' class="btn btn-warning btn-xs">Edit</a>';
                    $html .= '<a href=' . route('buku.destroy', $row) . ' class="btn btn-danger btn-xs" onclick="notificationBeforeDelete(event, this)"> Delete </a>';
                    return $html;
                })
                ->toJson();
        }
        return view('data_keanggotaan/index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_keanggotaan.create');
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
        'NIK' => 'required|max:16|min:16|unique:data_keanggotaan,NIK',
        'nama_depan' => 'required',
        'nama_belakang' => 'required',
        'pekerjaan' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        ]);
        $array = $request->all();
        $data_keanggotaan = data_keanggotaan::create($array);
          log::info("Menambah Data Anggota");
        return redirect()->route('data_keanggotaan.index')
        ->with('success_message', 'Berhasil menambah anggota baru');
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
    public function edit($NIK)
    {
        $data_keanggotaan = data_keanggotaan::find($NIK);
    if (!$data_keanggotaan) return redirect()->route('data_keanggotaan.index')
        ->with('error_message', 'Anggota dengan NIK'.$NIK.' tidak ada');
    return view('data_keanggotaan.edit', [
        'data_keanggotaan' => $data_keanggotaan
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
        'nama_depan' => 'required',
        'nama_belakang' => 'required',
        'pekerjaan' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
    ]);
    $data_keanggotaan = data_keanggotaan::find($id);
    // dd($data_keanggotaan);
    $data_keanggotaan->nama_depan = $request->nama_depan;
    $data_keanggotaan->nama_belakang = $request->nama_belakang;
    $data_keanggotaan->pekerjaan = $request->pekerjaan;
    $data_keanggotaan->tempat_lahir = $request->tempat_lahir;
    $data_keanggotaan->tanggal_lahir = $request->tanggal_lahir;
    $data_keanggotaan->alamat = $request->alamat;
    $data_keanggotaan->jenis_kelamin = $request->jenis_kelamin;
    $data_keanggotaan->save();
      log::info("Update Data Anggota");
    return redirect()->route('data_keanggotaan.index')
        ->with('success_message', 'Berhasil mengubah anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data_keanggotaan = data_keanggotaan::find($id);
    $data_keanggotaan->delete();
    return redirect()->route('data_keanggotaan.index')
        ->with('success_message', 'Berhasil menghapus anggota');
    }

    public function document (){
        $data_keanggotaan = data_keanggotaan::all();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        // $html ="";
        $html = view('data_keanggotaan/cetakdatakeanggotaan',compact('data_keanggotaan'));
        // $html=$html->render();
        $mpdf ->writeHTML($html);
        $mpdf -> Output("Daftar Anggota.pdf","I");
    }
}
