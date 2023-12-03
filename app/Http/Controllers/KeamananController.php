<?php

namespace App\Http\Controllers;

use App\Models\Keamanan;
use Illuminate\Http\Request;

class KeamananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keamanan = Keamanan::latest()->get();
        return view('keamanan.keamanan', compact('keamanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keamanan.modal.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Keamanan::create([
            'id'                => $request->id,
            'routerhub'      => $request->routerhub,
            'deep_skimmer'                => $request->deep_skimmer,
            'skimming'           => $request->skimming,
            'downlite_lampu'            => $request->downlite_lampu,
            'smoke_detector'        => $request->smoke_detector,
            'cover_card_Reader'        => $request->cover_card_Reader,
            'pinpad'        => $request->pinpad,
            'monitor_atm'        => $request->monitor_atm,
            'card_reader_atm'        => $request->card_reader_atm,
            'call_center'        => $request->call_center,
            'angkur'        => $request->angkur,
            'keterangan'        => $request->keterangan,
        ]);

        return redirect('keamanan')->with('toast_success', 'Data Keamanan Berhasil Tersimpan !');
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
        $keamanan = Keamanan::findorfail($id);
        return view('keamanan.modal.edit', compact('keamanan'));
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
        $keamanan = Keamanan::findorfail('$id');

        $keamanan->update($request->all());
        return redirect('keamanan')->with('toast_success','Data Keamanan Behasil Terupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keamanan = Keamanan::findorfail($id);
        $keamanan->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
