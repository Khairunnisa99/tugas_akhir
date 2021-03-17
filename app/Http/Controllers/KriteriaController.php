<?php

namespace App\Http\Controllers;

use App\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\PrettyPrinter\Standard;
use App\Models\standar;
use App\Models\Bab;
use App\Models\SubBab;
use App\Models\SubSubBab;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = SubSubBab::latest()->paginate(10);
        return view('kriteria.index', ['kriteria' => $kriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standar = SubBab::all();
        return view('kriteria.create', compact('standar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'id_subbab' => 'required',
            'NomerKriteria' => 'required',
            'namaKriteria' => 'required',
            'MaksudDanTujuan' => 'required'
        ]);

        // dd($request);
        // $bab = new SubBab();
        // $bab->SubBabNomor = $request->SubBabNomor;
        // $bab->SubBabNama = $request->SubBabNama;
        // $bab->SubBabStandard = $request->SubBabStandard;
        // $bab->SubBabDeskripsi = $request->SubBabDeskripsi;

        // $bab->save();
        $subbab = SubSubBab::create([
            'id_subbab' => $request->input('id_subbab'),
            'NomerKriteria' => $request->input('NomerKriteria'),
            'namaKriteria' => $request->input('namaKriteria'),
            'MaksudDanTujuan' => $request->input('MaksudDanTujuan'),

            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi'),
            'lock' => $request->input('lock')
        ]);

        // dd($bab);

        if ($subbab) {
            # code...
            return redirect()->route('kriteria.index')->with(['success' => 'Data Berhasil DiSimpan']);
        } else {
            return redirect()->route('kriteria.index')->with(['error' => 'Data Gagal DiSimpan']);
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
        $kriteria = kriteria::findOrFail($id);
        $standar = SubBab::all();
        return view('kriteria.edit', compact('standar', 'kriteria'));
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
         // dd($request);
         $this->validate($request, [
            'id_subbab' => 'required',
            'NomerKriteria' => 'required',
            'namaKriteria' => 'required',
            'MaksudDanTujuan' => 'required'

        ]);
        $kriteria = kriteria::findOrFail($id);
        $kriteria->update([
            'id_subbab' => $request->input('id_subbab'),
            'NomerKriteria' => $request->input('NomerKriteria'),
            'namaKriteria' => $request->input('namaKriteria'),
            'MaksudDanTujuan' => $request->input('MaksudDanTujuan'),

            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi'),
            'lock' => $request->input('lock')
        ]);
        // dd($bab);

        if ($kriteria) {
            # code...
            return redirect()->route('kriteria.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('kriteria.index')->with(['error' => 'Data Gagal DiUpdate']);
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
        $subbab = kriteria::findOrFail($id);
        $subbab->delete();

        return redirect()->route('kriteria.index');
    }
}
