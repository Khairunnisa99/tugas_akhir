<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\statusprogramkerja;


class StatusprogramkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusprogramkerja= statusprogramkerja::paginate(10);
        return view('statusprogramkerja.index',['statusprogramkerja'=>$statusprogramkerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusprogramkerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'statusProker' => 'required',
            'keteranganStatus' => 'required'

        ]);
        $statusprogramkerja = statusprogramkerja::findOrFail($id);
        $statusprogramkerja->update([
            'statusProker' => $request->statusProker,
            'keteranganStatus' => $request->keteranganStatus
            ]);
            if ($statusprogramkerja) {
                # code...
                return redirect()->route('statusprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('statusprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            }
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
        $statusprogramkerja = statusprogramkerja::find($id);

        return view('statusprogramkerja.edit', compact('statusprogramkerja'));
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
            'statusProker' => 'required',
            'keteranganStatus' => 'required'

        ]);
        $statusprogramkerja = statusprogramkerja::findOrFail($id);
        $statusprogramkerja->update([
            'statusProker' => $request->statusProker,
            'keteranganStatus' => $request->keteranganStatus
            ]);
            if ($statusprogramkerja) {
                # code...
                return redirect()->route('statusprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('statusprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusprogramkerja = statusprogramkerja::findOrFail($id);
        $statusprogramkerja->delete();

        return redirect()->route('statusprogramkerja.index');
    }
}
