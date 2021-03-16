<?php

namespace App\Http\Controllers;
use App\statuspelaksanaan;
use Illuminate\Http\Request;

class StatuspelaksanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuspelaksanaan= statuspelaksanaan::paginate(10);
        return view('statuspelaksanaan.index',['statuspelaksanaan'=>$statuspelaksanaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuspelaksanaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $request->validate([
            'statusPelaksanaan' => 'required',
            'keteranganStatus' => 'required'

        ]);
        $statuspelaksanaan = statuspelaksanaan::findOrFail($id);
        $statuspelaksanaan->update([
            'statusPelaksanaan' => $request->statusPelaksanaan,
            'keteranganStatus' => $request->keteranganStatus
            ]);
            if ($statuspelaksanaan) {
                # code...
                return redirect()->route('statuspelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('statuspelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $statuspelaksanaan = statuspelaksanaan::find($id);

        return view('statuspelaksanaan.edit', compact('statuspelaksanaan'));
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
            'statusPelaksanaan' => 'required',
            'keteranganStatus' => 'required'

        ]);
        $statuspelaksanaan = statuspelaksanaan::findOrFail($id);
        $statuspelaksanaan->update([
            'statusPelaksanaan' => $request->statusPelaksanaan,
            'keteranganStatus' => $request->keteranganStatus
            ]);
            if ($statuspelaksanaan) {
                # code...
                return redirect()->route('statuspelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('statuspelaksanaan.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $statuspelaksanaan = statuspelaksanaan::findOrFail($id);
        $statuspelaksanaan->delete();

        return redirect()->route('statuspelaksanaan.index');
    }
}
