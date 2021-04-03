<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubBab;
use App\Models\Bab;
use App\Models\SubBabDua;
use App\Models\SubBabTiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubBabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subbab = SubBab::latest()->paginate(10);

        // $subbab = DB::table('subbab')
        //     ->join('subsubbabdua', 'subbab.id', '=', 'subsubbabdua.id')
        //     ->join('subsubbabtiga', 'subbab.id', '=', 'subsubbabtiga.id')
        //     ->join('subsubbabempat', 'subbab.id', '=', 'subsubbabempat.id')
        //     ->select('subbab.*', 'subsubbabdua.*', 'subsubbabtiga.*', 'subsubbabempat.*')
        //     ->paginate(10);
        return view('standar.index', compact('subbab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bab = Bab::all();
        return view('standar.create', compact('bab'));
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
            'SubBabNomor' => 'required',
            'SubBabNama' => 'required',
            'SubBabStandard' => 'required',
            'SubBabDeskripsi' => 'required',
            'BabAkreditasi_idBabAkreditasi' => 'required'
        ]);
        // $bab = new SubBab();
        // $bab->SubBabNomor = $request->SubBabNomor;
        // $bab->SubBabNama = $request->SubBabNama;
        // $bab->SubBabStandard = $request->SubBabStandard;
        // $bab->SubBabDeskripsi = $request->SubBabDeskripsi;

        // $bab->save();
        $bab = SubBab::create([
            'SubBabNomor' => $request->input('SubBabNomor'),
            'SubBabNama' => $request->input('SubBabNama'),
            'SubBabStandard' => $request->input('SubBabStandard'),
            'SubBabDeskripsi' => $request->input('SubBabDeskripsi'),
            'BabAkreditasi_idBabAkreditasi' => $request->input('BabAkreditasi_idBabAkreditasi'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi'),
            'lock' => $request->input('lock')
        ]);
        // dd($bab);

        if ($bab) {
            # code...
            return redirect()->route('standar.index')->with(['success' => 'Data Berhasil DiSimpan']);
        } else {
            return redirect()->route('standar.index')->with(['error' => 'Data Gagal DiSimpan']);
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

        $standar = DB::table('subbab')
            ->leftJoin('babakreditasi', 'subbab.BabAkreditasi_idBabAkreditasi', '=', 'babakreditasi.id')
            ->select('subbab.*', 'babakreditasi.*')
            ->where('subbab.id', $id)
            ->first();
        // dd($standar);
        return view('standar.show', compact('standar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standar = SubBab::findOrFail($id);
        $bab = Bab::all();
        return view('standar.edit', compact('bab', 'standar'));
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
            'SubBabNomor' => 'required',
            'SubBabNama' => 'required',
            'SubBabStandard' => 'required',
            'SubBabDeskripsi' => 'required',
            'BabAkreditasi_idBabAkreditasi' => 'required'
        ]);
        $bab = SubBab::findOrFail($id);
        $bab->update([
            'SubBabNomor' => $request->input('SubBabNomor'),
            'SubBabNama' => $request->input('SubBabNama'),
            'SubBabStandard' => $request->input('SubBabStandard'),
            'SubBabDeskripsi' => $request->input('SubBabDeskripsi'),
            'BabAkreditasi_idBabAkreditasi' => $request->input('BabAkreditasi_idBabAkreditasi'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi'),
            'lock' => $request->input('lock')
        ]);
        // dd($bab);

        if ($bab) {
            # code...
            return redirect()->route('standar.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('standar.index')->with(['error' => 'Data Gagal DiUpdate']);
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
        //
    }
}
