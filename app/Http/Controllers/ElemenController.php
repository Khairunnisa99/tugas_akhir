<?php

namespace App\Http\Controllers;

use App\Models\SubBab;
use App\Models\SubSubBab;
use App\elemen;
use App\kriteria;
use App\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elemen = elemen::with('dokumen')->when(request()->q, function($elemen){
            $elemen = $elemen->where('NoElemen', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('elemen.index', ['elemen' => $elemen]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = kriteria::all();
        $dokumen = dokumen::all();
        return view('elemen.create', compact('kriteria', 'dokumen'));
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
            'SubSubBab_idSubSubBab' => 'required',
            // 'Documen_idDocumen' => 'required',
            'NoElemen' => 'required',
            'ElemenPenilaian' => 'required',
            'TelusurSasaran' => 'required',
            'MateriTelusur' => 'required',
            'DokumentInternal' => 'required',
            'DokumenEksternal' => 'required'

        ]);

        $elemen = elemen::create([
            'SubSubBab_idSubSubBab' => $request->input('SubSubBab_idSubSubBab'),
            'Documen_idDocumen' => $request->input('Documen_idDocumen'),
            'NoElemen' => $request->input('NoElemen'),
            'ElemenPenilaian' => $request->input('ElemenPenilaian'),
            'TelusurSasaran' => $request->input('TelusurSasaran'),
            'MateriTelusur' => $request->input('MateriTelusur'),
            'DokumentInternal' => $request->input('DokumentInternal'),
            'DokumenEksternal' => $request->input('DokumenEksternal'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi'),
            'skor' => $request->input('skor'),
            'lock' => $request->input('lock')

        ]);

        //  asign ke dokumen
        $elemen->dokumen()->attach($request->input('dokumen'));
        $elemen->save();

        //dd($babs);
        if ($elemen) {
            # code...
            return redirect()->route('elemen.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('elemen.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $elemen = DB::table('elemen')
            ->join('subsubbab', 'elemen.SubSubBab_idSubSubBab', '=', 'subsubbab.id')
            ->join('dokumen', 'elemen.id', '=', 'dokumen.id')
            ->select('elemen.*', 'subsubbab.*', 'dokumen.*')
            ->where('elemen.id', $id)
            ->first();
        // dd($standar);
        return view('elemen.show', compact('elemen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elemen = elemen::findOrFail($id);
        $kriteria = kriteria::latest()->get();
        $dokumen = dokumen::latest()->get();
        return view('elemen.edit', compact('kriteria', 'elemen', 'dokumen'));
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
            'SubSubBab_idSubSubBab' => 'required',
            'NoElemen' => 'required',
            'ElemenPenilaian' => 'required',
            'TelusurSasaran' => 'required',
            'MateriTelusur' => 'required',
            'DokumentInternal' => 'required',
            'DokumenEksternal' => 'required'
        ]);


        $elemen = elemen::findOrFail($id);
        $elemen->update([
            'SubSubBab_idSubSubBab' => $request->input('SubSubBab_idSubSubBab'),
            'NoElemen' => $request->input('NoElemen'),
            'ElemenPenilaian' => $request->input('ElemenPenilaian'),
            'TelusurSasaran' => $request->input('TelusurSasaran'),
            'MateriTelusur' => $request->input('MateriTelusur'),
            'DokumentInternal' => $request->input('DokumentInternal'),
            'DokumenEksternal' => $request->input('DokumenEksternal')
        ]);
        // dd($bab);
        $elemen->dokumen()->sync($request->input('dokumen'));

        if ($elemen) {
            # code...
            return redirect()->route('elemen.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('elemen.index')->with(['error' => 'Data Gagal DiUpdate']);
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
        $kriteria = elemen::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('elemen.index');
    }
}
