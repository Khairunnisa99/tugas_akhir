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
        $periodeprogramkerja = periodeprogramkerja::latest()->when(request()->q, function ($periodeprogramkerja) {
            $periodeprogramkerja = $periodeprogramkerja->where(
                'TahunProgramKerja',
                'like',
                '%' . request()->q . '%'
            );
        })->paginate(5);
        return view('periodeprogramkerja.index', ['periodeprogramkerja' => $periodeprogramkerja]);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'TahunProgramKerja' => 'required',
            'DeskripsiPeriodeProgramKerja' => 'required'
        ]);

        $periodeprogramkerja = periodeprogramkerja::create([
            'TahunProgramKerja' => $request->input('TahunProgramKerja'),
            'DeskripsiPeriodeProgramKerja' => $request->input('DeskripsiPeriodeProgramKerja'),

        ]);
        // dd($babs);
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
        $periodeprogramkerja = periodeprogramkerja::findOrFail($id);
        return view('periodeprogramkerja.edit', compact('periodeprogramkerja'));
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
            'TahunProgramKerja' => 'required',
            'DeskripsiPeriodeProgramKerja' => 'required'
        ]);
        $periodeprogramkerja = periodeprogramkerja::findOrFail($id);
        $periodeprogramkerja->update([
            'TahunProgramKerja' => $request->input('TahunProgramKerja'),
            'DeskripsiPeriodeProgramKerja' => $request->input('DeskripsiPeriodeProgramKerja')
        ]);
        if ($periodeprogramkerja) {
            # code...
            return redirect()->route('periodeprogramkerja.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('periodeprogramkerja.index')->with(['error' => 'Data Gagal DiUpdate']);
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
