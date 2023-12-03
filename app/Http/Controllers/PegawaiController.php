<?php

namespace App\Http\Controllers;

use App\Models\Uker;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Keamanan;
use Barryvdh\DomPDF\PDF;
use App\Models\TerminalId;
use App\Models\Kelengkapan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $pegawai = Pegawai::where('nama_pegawai','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $pegawai = Pegawai::with('jabatan', 'uker', 'tid')->latest()->paginate(5);
        }
        return view('pegawai.index', compact('pegawai'));
    }

    public function cetak()
    {
        $tid = TerminalId::all();
        $uk  = Uker::all();
        $jab = Jabatan::all();
        $cetakPegawai = Pegawai::with('jabatan', 'uker', 'tid')->get();
        $cetakKelengkapan = Kelengkapan::get();
        $cetakKeamanan = Keamanan::get();
        return view('pegawai.cetak', compact('cetakPegawai', 'cetakKelengkapan', 'cetakKeamanan', 'jab', 'uk', 'tid'));
    }

    // public function exportPDF(){
    //     $tid = TerminalId::all();
    //     $uk  = Uker::all();
    //     $jab = Jabatan::all();
    //     $cetakKelengkapan = Kelengkapan::get();
    //     $cetakKeamanan = Keamanan::get();
    //     $exportPegawaiPDF = Pegawai::with('jabatan', 'uker', 'tid')->get();
    //     view()->share([
    //         'exportPegawaiPDF' => $exportPegawaiPDF, 
    //         'cetakKelengkapan' => $cetakKelengkapan, 
    //         'cetakKeamanan'    => $cetakKeamanan, 
    //         'jab'              => $jab, 
    //         'uk'               => $uk, 
    //         'tid'              => $tid
    //     ]);
    //     $pdf = PDF::loadview('pegawai.pegawai-pdf');
    //     return $pdf->download('Laporan.pdf');
        
    //     return view('', compact('exportPegawaiPDF', 'cetakKelengkapan', 'cetakKeamanan', 'jab', 'uk', 'tid'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tid = TerminalId::all();
        $uk = Uker::all();
        $jab = Jabatan::all();
        return view('pegawai.tambah', compact('uk', 'jab', 'tid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'id'                => $request->id,
            'nama_pegawai'      => $request->nama_pegawai,
            'pn'                => $request->pn,
            'uker_id'           => $request->uker_id,
            'tid_id'            => $request->tid_id,
            'jabatan_id'        => $request->jabatan_id,
        ]);

        return redirect('pegawai')->with('toast', 'Data berhasil ditambahkan');
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
        $tid = TerminalId::all();
        $uk  = Uker::all();
        $jab = Jabatan::all();
        $peg = Pegawai::with('jabatan', 'uker', 'tid')->findorfail($id);
        return view('pegawai.edit', compact('peg', 'jab', 'uk', 'tid'));
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
        $peg = Pegawai::findorfail($id);
        $peg->update($request->all());

        return redirect('pegawai')->with('toast_success', 'Data Pegawai Berhasil Terupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
