<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubBabEmpat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubBab;

class SubBabEmpatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babs = SubBabEmpat::latest()->paginate(10);
        return view('babempat.index', compact('babs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standar = SubBab::all();
        return view('babempat.create', compact('standar'));
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

        $subbab = SubBabEmpat::create([
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
            return redirect()->route('bab_empat.index')->with(['success' => 'Data Berhasil disimpan']);
        } else {
            return redirect()->route('bab_empat.index')->with(['error' => 'Data Gagal disimpan']);
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
        $kriteria = DB::table('subsubbabempat')
            ->leftJoin('subbab', 'subsubbabempat.id_subbab', '=', 'subbab.id')
            ->select('subsubbabempat.*', 'subbab.*')
            ->where('subsubbabempat.id', $id)
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
        $subbab = SubBabEmpat::findOrFail($id);
        $standar = SubBab::all();
        return view('babempat.edit', compact('subbab', 'standar'));
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
        $subbab = SubBabEmpat::findOrFail($id);
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
            return redirect()->route('bab_empat.index')->with(['success' => 'Data Berhasil diupdate']);
        } else {
            return redirect()->route('bab_empat.index')->with(['error' => 'Data Gagal diupdate']);
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
        $bab = SubBabEmpat::findOrFail($id);

        $bab->delete();
        return redirect()->route('bab_empat.index');
    }
}
