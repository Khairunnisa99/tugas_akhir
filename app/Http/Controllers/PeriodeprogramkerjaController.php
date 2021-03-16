<?php

namespace App\Http\Controllers;

use App\periodeprogramkerja;
use Illuminate\Http\Request;

class PeriodeprogramkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodeprogramkerja= periodeprogramkerja::paginate(10);
        return view('periodeprogramkerja.index',['periodeprogramkerja'=>$periodeprogramkerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodeprogramkerja.create');
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
            'NamaPeriodeProgramKerja' => 'required',
            'TahunProgramKerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiPeriodeProgramKerja' => 'required',
            'lock' => 'required'

        ]);
        $periodeprogramkerja = periodeprogramkerja::findOrFail($id);
        $periodeprogramkerja->update([
            'NamaProgramKerja' => $request->NamaProgramKerja,
            'TahunProgramKerja' => $request->TahunProgramKerja,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalBerakhir' => $request->tanggalBerakhir,
            'DeskripsiPeriodeProgramKerja' => $request->DeskripsiPeriodeProgramKerja,
            'lock' => $request->lock
            ]);
            if ($periodeprogramkerja) {
                # code...
                return redirect()->route('periodeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('periodeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        //
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
            'NamaPeriodeProgramKerja' => 'required',
            'TahunProgramKerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiPeriodeProgramKerja' => 'required',
            'lock' => 'required'

        ]);
        $periodeprogramkerja = periodeprogramkerja::findOrFail($id);
        $periodeprogramkerja->update([
            'NamaProgramKerja' => $request->NamaProgramKerja,
            'TahunProgramKerja' => $request->TahunProgramKerja,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalBerakhir' => $request->tanggalBerakhir,
            'DeskripsiPeriodeProgramKerja' => $request->DeskripsiPeriodeProgramKerja,
            'lock' => $request->lock
            ]);
            if ($periodeprogramkerja) {
                # code...
                return redirect()->route('periodeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('periodeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $periodeprogramkerja = periodeprogramkerja::findOrFail($id);
        $periodeprogramkerja->delete();

        return redirect()->route('periodeprogramkerja.index');
    }
}
