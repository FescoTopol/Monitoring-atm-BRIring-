<?php

namespace App\Http\Controllers;

use App\Models\Kelengkapan;
use Illuminate\Http\Request;

class KelengkapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelengkapan = Kelengkapan::latest()->get();
        return view('kelengkapan.kelengkapan', compact('kelengkapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelengkapan.modal.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelengkapan = Kelengkapan::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move(public_path().'/img', $request->file('gambar')->getClientOriginalName());
            $kelengkapan->gambar = $request->file('gambar')->getClientOriginalName();
            $kelengkapan->save();
        }


        // $nm = $request->gambar;
        // $namaFile = time().rand(100,999).".".$nm->getClientOriginalName();

        //     $dtUpload = new Kelengkapan;
        //     $dtUpload->sticker = $request->sticker;
        //     $dtUpload->ruangan = $request->ruangan; 
        //     $dtUpload->pylon = $request->pylon; 
        //     $dtUpload->ac = $request->ac; 
        //     $dtUpload->cat = $request->cat; 
        //     // $dtUpload->created_at = $request->created_at; 
        //     $dtUpload->gambar = $namaFile;
            
        //     $nm->move(public_path().'/img', $namaFile);
        //     $dtUpload->save();

            return redirect('kelengkapan')->with('toast_success', 'Data Kelengkapan Berhasil Tersimpan !');

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
        $kelengkapan = Kelengkapan::findorfail($id);
        return view('kelengkapan.modal.edit', compact('kelengkapan'));
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
        $kelengkapan = Kelengkapan::findorfail($id);
        
        $kelengkapan->update($request->all());
        return redirect('kelengkapan')->with('toast_success', 'Data Kelengkapan Berhasil Terupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelengkapan = Kelengkapan::findorfail($id);
        $kelengkapan->delete();
        
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
