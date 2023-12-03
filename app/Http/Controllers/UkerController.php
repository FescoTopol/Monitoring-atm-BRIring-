<?php

namespace App\Http\Controllers;

use App\Models\Uker;
use Illuminate\Http\Request;

class UkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uker = Uker::paginate(5);
        return view('unitKerja.index', compact('uker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unitKerja.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Uker::create([
            'id'         => $request->id,
            'uker'       => $request->uker,
        ]);

        return redirect('uker')->with('toast_success', 'Data Uker Berhasil Tersimpan !');
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
        $uker = Uker::findorfail($id);
        return view('unitKerja.index', compact('uker'));
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
        $uker = Uker::findorfail($id);
        $uker->update($request->all());

        return redirect('uker')->with('toast_success', 'Data Uker Berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uker = Uker::findorfail($id);
        $uker->delete();
        
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
