<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubBabTiga;
use Illuminate\Http\Request;
use App\Models\SubBab;
use Illuminate\Support\Facades\DB;

class SubBabTigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$babs = SubBabTiga::latest()->paginate(10);
        $babs = DB::table('subsubbabtiga')->paginate(10);
        return view('babtiga.index', compact('babs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standar = SubBab::all();
        return view('babtiga.create', compact('standar'));
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

        $subbab = SubBabTiga::create([
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
            return redirect()->route('bab_tiga.index')->with(['success' => 'Data Berhasil disimpan']);
        } else {
            return redirect()->route('bab_tiga.index')->with(['error' => 'Data Gagal disimpan']);
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
        $kriteria = DB::table('subsubbabtiga')
        ->leftJoin('subbab', 'subsubbabtiga.id_subbab', '=', 'subbab.id')
        ->select('subsubbabtiga.*', 'subbab.*')
        ->where('subsubbabtiga.id', $id)
        ->first();
        // dd($kriteria);
        return view('babtiga.show', compact('kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subbab = SubBabTiga::findOrFail($id);
        $standar = SubBab::all();
        return view('babtiga.edit', compact('subbab', 'standar'));
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
        $subbab = SubBabTiga::findOrFail($id);
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
            return redirect()->route('bab_tiga.index')->with(['success' => 'Data Berhasil diupdate']);
        } else {
            return redirect()->route('bab_tiga.index')->with(['error' => 'Data Gagal diupdate']);
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
        $bab = SubBabTiga::findOrFail($id);

        $bab->delete();
        return redirect()->route('bab_tiga.index');
    }
}
