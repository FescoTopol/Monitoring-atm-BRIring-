<?php

namespace App\Http\Controllers;

use App\Models\TerminalId;
use Illuminate\Http\Request;

class TidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminalId = TerminalId::paginate(5);
        return view('tid.index', compact('terminalId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tid.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TerminalId::create([
            'id'         => $request->id,
            'uker'       => $request->uker,
        ]);

        return redirect('tid')->with('toast_success', 'Data Uker Berhasil Tersimpan !');
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
        $terminalId = TerminalId::findorfail($id);
        return view('tid.index', compact('terminalId'));
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
        $terminalId = TerminalId::findorfail($id);
        $terminalId->update($request->all());

        return redirect('tid')->with('toast_success', 'Data TID Berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminalId = TerminalId::findorfail($id);
        $terminalId->delete();
        
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
