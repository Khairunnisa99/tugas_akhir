<?php

namespace App\Http\Controllers;

use App\periodeprogramkerja;
use App\programkerja;
use App\statuspelaksanaan;
use App\statusprogramkerja;
use App\tipeprogramkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramkerjaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:programkerja.index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $programkerja = DB::table('programkerja')
            ->leftJoin('statusprogramkerja', 'programkerja.statusprogramkerja_idstatusprogramkerja', '=', 'statusprogramkerja.id')
            ->leftJoin('periodeprogramkerja', 'programkerja.periodeprogramkerja_idperiodeprogramkerja', '=', 'periodeprogramkerja.id')
            ->leftJoin('tipeprogramkerja', 'programkerja.tipeprogramkerja_idtipeprogramkerja', '=', 'tipeprogramkerja.id')
            ->select('programkerja.*', 'statusprogramkerja.statusProker', 'periodeprogramkerja.TahunProgramKerja', 'tipeprogramkerja.tipeprogram')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('programkerja.index', compact('programkerja'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = periodeprogramkerja::all();
        $tipe = tipeprogramkerja::all();
        $pelaksanaan = statusprogramkerja::all();
        return view('programkerja.create', compact('periode', 'tipe', 'pelaksanaan'));
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
        $request->validate([
            'NamaProgramKerja' => 'required',
            'periodeprogramkerja_idperiodeprogramkerja' => 'required',
            'tipeprogramkerja_idtipeprogramkerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiProgramKerja' => 'required',
            'statusprogramkerja_idstatusprogramkerja' => 'required',
            // 'lock' => 'required'

        ]);
        $programkerja = programkerja::create([
            'NamaProgramKerja' => $request->input('NamaProgramKerja'),
            'periodeprogramkerja_idperiodeprogramkerja' => $request->input('periodeprogramkerja_idperiodeprogramkerja'),
            'tipeprogramkerja_idtipeprogramkerja' => $request->input('tipeprogramkerja_idtipeprogramkerja'),
            'tanggalMulai' => $request->input('tanggalMulai'),
            'tanggalBerakhir' => $request->input('tanggalBerakhir'),
            'DeskripsiProgramKerja' => $request->input('DeskripsiProgramKerja'),
            'statusprogramkerja_idstatusprogramkerja' => $request->input('statusprogramkerja_idstatusprogramkerja'),
            'lock' => $request->input('lock')
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
        $programkerja = programkerja::findOrFail($id);
        $periode = periodeprogramkerja::all();
        $tipe = tipeprogramkerja::all();
        $pelaksanaan = statusprogramkerja::all();
        return view('programkerja.edit', compact('programkerja', 'periode', 'tipe', 'pelaksanaan'));
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
            'periodeprogramkerja_idperiodeprogramkerja' => 'required',
            'tipeprogramkerja_idtipeprogramkerja' => 'required',
            'tanggalMulai' => 'required',
            'tanggalBerakhir' => 'required',
            'DeskripsiProgramKerja' => 'required',
            'statusprogramkerja_idstatusprogramkerja' => 'required',
            // 'lock' => 'required'

        ]);
        $programkerja = programkerja::findOrFail($id);
        $programkerja->update([
            'NamaProgramKerja' => $request->input('NamaProgramKerja'),
            'periodeprogramkerja_idperiodeprogramkerja' => $request->input('periodeprogramkerja_idperiodeprogramkerja'),
            'tipeprogramkerja_idtipeprogramkerja' => $request->input('tipeprogramkerja_idtipeprogramkerja'),
            'tanggalMulai' => $request->input('tanggalMulai'),
            'tanggalBerakhir' => $request->input('tanggalBerakhir'),
            'DeskripsiProgramKerja' => $request->input('DeskripsiProgramKerja'),
            'statusprogramkerja_idstatusprogramkerja' => $request->input('statusprogramkerja_idstatusprogramkerja'),
            'lock' => $request->input('lock')
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
