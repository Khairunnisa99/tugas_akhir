<?php

namespace App\Http\Controllers;

use App\rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class RapatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:rapat.index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapat = rapat::latest()->when(request()->q, function ($rapat) {
            $rapat = $rapat->where('namaRapat', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('rapat.index', ['rapat' => $rapat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rapat.create');
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
            'namaRapat' => 'required',
            'WaktuRapat' => 'required',
            //'KeteranganRapat' => 'required',
            //'PesertaRapat' => 'required',
            //'NotulenRapat' => 'required',
            // 'lock' => 'required',
            // 'Umpan' => 'required',
            //'MateriRapat' => 'required',
            //'Rekomendasi' => 'required',
            //'TindakLanjut' => 'required'

        ]);

        $rapat = rapat::create([
            'namaRapat' => $request->input('namaRapat'),
            'WaktuRapat' => $request->input('WaktuRapat'),
            'KeteranganRapat' => $request->input('KeteranganRapat'),
            'PesertaRapat' => $request->input('PesertaRapat'),
            'NotulenRapat' => $request->input('NotulenRapat'),
            'lock' => $request->input('lock'),
            'Umpan' => $request->input('Umpan'),
            'MateriRapat' => $request->input('MateriRapat'),
            'Rekomendasi' => $request->input('Rekomendasi'),
            'TindakLanjut' => $request->input('TindakLanjut')

        ]);
        // dd($babs);
        if ($rapat) {
            # code...
            return redirect()->route('rapat.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('rapat.index')->with(['success' => 'Data Berhasil Disimpan']);
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

        $rapat = DB::table('rapat')

            ->where('rapat.id', $id)
            ->first();
        // dd($kriteria);
        return view('rapat.show', compact('rapat'));
    }

    public function print_all()
    {
        $rapat = rapat::all();
        $pdf = PDF::loadview('rapat.print_all', ['rapat' => $rapat]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(rapat $rapat)
    {
        return view('rapat.edit', compact('rapat'));
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
            'namaRapat' => 'required',
            'WaktuRapat' => 'required',
            'KeteranganRapat' => 'required',
            'PesertaRapat' => 'required',
            //'Umpan' => 'required',
            //'lock' => 'required',
            'MateriRapat' => 'required',
            'Rekomendasi' => 'required',
            'TindakLanjut' => 'required'
        ]);
        $rapat = rapat::findOrFail($id);
        $rapat->update([

            'namaRapat' => $request->namaRapat,
            'WaktuRapat' => $request->WaktuRapat,
            'KeteranganRapat' => $request->KeteranganRapat,
            'PesertaRapat' => $request->PesertaRapat,
            'lock' => $request->lock,
            'Umpan' => $request->Umpan,
            'MateriRapat' => $request->MateriRapat,
            'Rekomendasi' => $request->Rekomendasi,
            'TindakLanjut' => $request->TindakLanjut
        ]);

        if ($rapat) {
            # code...
            return redirect()->route('rapat.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('rapat.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $rapat = rapat::findOrFail($id);
        $rapat->delete();

        return redirect()->route('rapat.index');
    }
    public function searchsatu(Request $request)
    {
        $carisatu = $request->search;
        $posts = DB::table('rapat')
            ->where('KeteranganRapat', 'like', "%" . $carisatu . "%")
            ->paginate();

        return view('rapat.index', ['rapat' => $posts]);
    }
}
