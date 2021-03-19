<?php

namespace App\Http\Controllers;
use App\programkerja;
use Illuminate\Http\Request;

class ProgramkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programkerja= programkerja::latest()->paginate(10);
        return view('programkerja.index',['programkerja'=>$programkerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programkerja.create');
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
            'NamaProgramKerja' => 'required',
            'peiodeprogramkerja_idperiodeprogramkerja' => 'required',
            'tipeprogramkerja_idtipeprogramkerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiProgramKerja' => 'required',
            'statusprogramkerja_idstatusprogramkerja' => 'required',
            'lock' => 'required'

        ]);
        $programkerja = programkerja::create([
            'NamaProgramKerja' => $request->NamaProgramKerja,
            'peiodeprogramkerja_idperiodeprogramkerja' => $request->periodeprogramkerja_idperiodeprogramkerja,
            'tipeprogramkerja_idtipeprogramkerja' => $request->tipeprogramkerja_idtipeprogramkerja,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalBerakhir' => $request->tanggalBerakhir,
            'DeskripsiProgramKerja' => $request->DeskripsiProgramKerja,
            'statusprogramkerja_idstatusprogramkerja' => $request->statusprogramkerja_idstatusprogramkerja,
            'lock' => $request->lock
            ]);
            if ($programkerja) {
                # code...
                return redirect()->route('programkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('programkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
            'NamaProgramKerja' => 'required',
            'peiodeprogramkerja_idperiodeprogramkerja' => 'required',
            'tipeprogramkerja_idtipeprogramkerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiProgramKerja' => 'required',
            'statusprogramkerja_idstatusprogramkerja' => 'required',
            'lock' => 'required'

        ]);
        $programkerja = programkerja::findOrFail($id);
        $programkerja->update([

            'NamaProgramKerja' => $request->NamaProgramKerja,
            'peiodeprogramkerja_idperiodeprogramkerja' => $request->periodeprogramkerja_idperiodeprogramkerja,
            'tipeprogramkerja_idtipeprogramkerja' => $request->tipeprogramkerja_idtipeprogramkerja,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalBerakhir' => $request->tanggalBerakhir,
            'DeskripsiProgramKerja' => $request->DeskripsiProgramKerja,
            'statusprogramkerja_idstatusprogramkerja' => $request->statusprogramkerja_idstatusprogramkerja,
            'lock' => $request->lock
            ]);
            if ($programkerja) {
                # code...
                return redirect()->route('programkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
            } else {
                return redirect()->route('programkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $programkerja = programkerja::findOrFail($id);
        $programkerja->delete();

        return redirect()->route('programkerja.index');
    }
}
