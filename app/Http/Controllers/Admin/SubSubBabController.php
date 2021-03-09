<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubSubBab;
use Illuminate\Http\Request;

class SubSubBabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babs = SubSubBab::latest()->paginate(10);
        return view('babsatu.index', compact('babs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('babsatu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'id_subbab' => 'required',
            'NomerKriteria' => 'required',
            'namaKriteria' => 'required',
            'MaksudDanTujuan' => 'required'
        ]);

        $subbab = SubSubBab::create([
            'id_subbab' => $request->input('id_subbab'),
            'NomerKriteria' => $request->input('NomerKriteria'),
            'namaKriteria' => $request->input('namaKriteria'),
            'MaksudDanTujuan' => $request->input('MaksudDanTujuan'),
            'Skor' => $request->input('Skor'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('Skor'),
            'lock' => $request->input('lock'),
        ]);
        // dd($subbab);

        if ($subbab) {
            return redirect()->route('bab_satu.index')->with(['success' => 'Data Berhasil disimpan']);
        } else {
            return redirect()->route('bab_satu.index')->with(['error' => 'Data Gagal disimpan']);
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
        $subbab = SubSubBab::findOrFail($id);
        return view('babsatu.edit', compact('subbab'));
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
        $this->validate($request, [
            // 'id_subbab' => 'required',
            'NomerKriteria' => 'required',
            'namaKriteria' => 'required',
            'MaksudDanTujuan' => 'required'
        ]);
        $subbab = SubSubBab::findOrFail($id);
        $subbab->update([
            'id_subbab' => $request->input('id_subbab'),
            'NomerKriteria' => $request->input('NomerKriteria'),
            'namaKriteria' => $request->input('namaKriteria'),
            'MaksudDanTujuan' => $request->input('MaksudDanTujuan'),
            'Skor' => $request->input('Skor'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('Skor'),
            'lock' => $request->input('lock'),
        ]);
        // dd($subbab);

        if ($subbab) {
            return redirect()->route('bab_satu.index')->with(['success' => 'Data Berhasil diupdate']);
        } else {
            return redirect()->route('bab_satu.index')->with(['error' => 'Data Gagal diupdate']);
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
        $bab = SubSubBab::findOrFail($id);

        $bab->delete();
        return redirect()->route('bab_satu.index');
    }
}
