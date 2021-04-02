<?php

namespace App\Http\Controllers;

use App\periodeakreditasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PeriodeakreditasiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodeakreditasi = periodeakreditasi::latest()->when(request()->q, function ($periodeakreditasi) {
            $periodeakreditasi = $periodeakreditasi->where(
                'namaPeriodeAkreditasi',
                'like',
                '%' . request()->q . '%'
            );
        })->paginate(5);
        return view('periodeakreditasi.index', ['periodeakreditasi' => $periodeakreditasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('periodeakreditasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this-> validate($request,[
            'namaPeriodeAkreditasi' =>'required',
            'tahunProgramAkreditasi'=> 'required',
            'TanggalMulai' => 'required',
            'TanggalBerakhir' => 'required',
            //'periodeakreditasicStatus' => 'required',
            'deskripsiPeriodeAkreditasi' => 'required'
            //'lock' => 'required'
        ]);
        $periodeakreditasi = periodeakreditasi :: create([
            'namaPeriodeAkreditasi' => $request->input('namaPeriodeAkreditasi'),
            'tahunProgramAkreditasi' => $request -> input('tahunProgramAkreditasi'),
            'TanggalMulai' => $request ->input('TanggalMulai'),
            'TanggalBerakhir' => $request ->input('TanggalBerakhir'),
            'periodeakreditasicStatus' => $request ->input('periodeakreditasicStatus'),
            'deskripsiPeriodeAkreditasi' => $request ->input('deskripsiPeriodeAkreditasi'),
            'lock' => $request ->input('lock')

        ]);

        if ($periodeakreditasi) {
            # code...
            return redirect()->route('periodeakreditasi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('periodeakreditasi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $periodeakreditasi = DB::table('periodeakreditasi')
            ->where('periodeakreditasi.id', $id)
            ->get();
        // dd($kriteria);
        return view('periodeakreditasi.show', compact('periodeakreditasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(periodeakreditasi $periodeakreditasi)
    {
        return view('periodeakreditasi.edit', compact('periodeakreditasi'));
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
            'namaPeriodeAkreditasi' =>'required',
            'tahunProgramAkreditasi'=> 'required',
            'TanggalMulai' => 'required',
            'TanggalBerakhir' => 'required',
            //'periodeakreditasicStatus' => 'required',
            'deskripsiPeriodeAkreditasi' => 'required'
            //'lock' => 'required'
        ]);
        $periodeakreditasi = periodeakreditasi::findOrFail($id);
        $periodeakreditasi -> update([
            'namaPeriodeAkreditasi' => $request->input('namaPeriodeAkreditasi'),
            'tahunProgramAkreditasi' => $request -> input('tahunProgramAkreditasi'),
            'TanggalMulai' => $request ->input('TanggalMulai'),
            'TanggalBerakhir' => $request ->input('TanggalBerakhir'),
            'periodeakreditasicStatus' => $request ->input('periodeakreditasicStatus'),
            'deskripsiPeriodeAkreditasi' => $request ->input('deskripsiPeriodeAkreditasi'),
            'lock' => $request ->input('lock')

        ]);
        if ($periodeakreditasi) {
            # code...
            return redirect()->route('periodeakreditasi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('periodeakreditasi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $periodeakreditasi = periodeakreditasi::findOrFail($id);
        $periodeakreditasi->delete();

        return redirect()->route('periodeakreditasi.index');
    }
}
