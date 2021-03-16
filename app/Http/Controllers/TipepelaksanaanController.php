<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipepelaksanaan;


class TipepelaksanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipepelaksanaan= tipepelaksanaan::paginate(10);
        return view('tipepelaksanaan.index',['tipepelaksanaan'=>$tipepelaksanaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipepelaksanaan.create');
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
            'namaTypePelaksanaan' => 'required',
            'keterangan' => 'required'

        ]);
        $tipepelaksanaan = statusprogramkerja::findOrFail($id);
        $tipepelaksanaan->update([
            'namaTypePelaksanaan' => $request->namaTypePelaksanaan,
            'keterangan' => $request->keterangan
            ]);
            if ($tipepelaksanaan) {
                # code...
                return redirect()->route('tipepelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('tipepelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $tipepelaksanaan = tipepelaksanaan::find($id);

        return view('tipepelaksanaan.edit', compact('tipepelaksanaan'));
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
            'namaTypePelaksanaan' => 'required',
            'keterangan' => 'required'

        ]);
        $tipepelaksanaan = tipepelaksanaan::findOrFail($id);
        $tipepelaksanaan->update([
            'namaTypePelaksanaan' => $request->namaTypePelaksanaan,
            'keterangan' => $request->keterangan
            ]);
            if ($tipepelaksanaan) {
                # code...
                return redirect()->route('tipepelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('tipepelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $tipepelaksanaan = tipepelaksanaan::findOrFail($id);
        $tipepelaksanaan->delete();

        return redirect()->route('tipepelaksanaan.index');
    }
}
