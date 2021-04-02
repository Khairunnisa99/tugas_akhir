<?php

namespace App\Http\Controllers;
use App\pelaksanaanprogram;
use App\programkerja;
use App\tipepelaksanaan;
use App\statuspelaksanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaanprogramController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaksanaanprogram = DB::table('pelaksanaanprogram')
            ->leftJoin('programkerja', 'pelaksanaanprogram.programkerja_idprogramkerja', '=', 'programkerja.id')
            ->leftJoin('typepelaksanaan', 'pelaksanaanprogram.typepelaksanaan_idtypepelaksanaan', '=', 'typepelaksanaan.id')
            ->leftJoin('statuspelaksanaan', 'pelaksanaanprogram.statuspelaksanaan_idstatuspelaksanaan', '=', 'statuspelaksanaan.id')

            ->select('pelaksanaanprogram.*', 'programkerja.NamaProgramKerja', 'typepelaksanaan.namaTypePelaksanaan', 'statuspelaksanaan.statusPelaksanaan')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('pelaksanaanprogram.index', compact('pelaksanaanprogram'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programkerja = programkerja::all();
        $tipepelak = tipepelaksanaan::all();
        $spelaksanaan = statuspelaksanaan::all();
        return view('pelaksanaanprogram.create', compact('programkerja', 'tipepelak', 'spelaksanaan'));
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
            'programkerja_idprogramkerja' => 'required',
            'typepelaksanaan_idtypepelaksanaan' => 'required',
            'NamaPelaksanaan' => 'required',
            'TanggalMulai' => 'required',
            'TanggalBerakhir' => 'required',
            'KeteranganPelaksanaan' => 'required',
            'statuspelaksanaan_idstatuspelaksanaan' => 'required'
        ]);

        $pelaksanaanprogram = pelaksanaanprogram::create([
            'programkerja_idprogramkerja' => $request->input('programkerja_idprogramkerja'),
            'typepelaksanaan_idtypepelaksanaan' => $request->input('typepelaksanaan_idtypepelaksanaan'),
            'NamaPelaksanaan' => $request->input('NamaPelaksanaan'),
            'TanggalMulai' => $request->input('TanggalMulai'),
            'TanggalBerakhir' => $request->input('TanggalBerakhir'),
            'KeteranganPelaksanaan' => $request->input('KeteranganPelaksanaan'),
            'statuspelaksanaan_idstatuspelaksanaan' => $request->input('statuspelaksanaan_idstatuspelaksanaan'),
            'lock' => $request->input('lock')
        ]);
        // dd($babs);
        if ($pelaksanaanprogram) {
            # code...
            return redirect()->route('pelaksanaanprogram.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('pelaksanaanprogram.index')->with(['success' => 'Data Berhasil Disimpan']);
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

        $pelaksanaanprogram = DB::table('pelaksanaanprogram')
            ->leftJoin('programkerja', 'pelaksanaanprogram.programkerja_idprogramkerja', '=', 'programkerja.id')
            ->leftJoin('typepelaksanaan', 'pelaksanaanprogram.typepelaksanaan_idtypepelaksanaan', '=', 'typepelaksanaan.id')
            ->leftJoin('statuspelaksanaan', 'pelaksanaanprogram.statuspelaksanaan_idstatuspelaksanaan', '=', 'statuspelaksanaan.id')

            ->select('pelaksanaanprogram.*', 'programkerja.NamaProgramKerja', 'typepelaksanaan.namaTypePelaksanaan', 'statuspelaksanaan.statusPelaksanaan')
            ->where('pelaksanaanprogram.id', $id)
            ->get();
          // dd($kriteria);
        return view('pelaksanaanprogram.show', compact('pelaksanaanprogram'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaksanaanprogram = pelaksanaanprogram::findOrFail($id);
        $programkerja = programkerja::all();
        $tipepelak = tipepelaksanaan::all();
        $spelaksanaan = statuspelaksanaan::all();
        return view('pelaksanaanprogram.edit', compact('pelaksanaanprogram','programkerja', 'tipepelak', 'spelaksanaan'));
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
            'programkerja_idprogramkerja' => 'required',
            'typepelaksanaan_idtypepelaksanaan' => 'required',
            'NamaPelaksanaan' => 'required',
            'TanggalMulai' => 'required',
            'TanggalBerakhir' => 'required',
            'KeteranganPelaksanaan' => 'required',
            'statuspelaksanaan_idstatuspelaksanaan' => 'required'
        ]);

        $pelaksanaanprogram = pelaksanaanprogram::findOrFail($id);
        $pelaksanaanprogram->update([
            'programkerja_idprogramkerja' => $request->input('programkerja_idprogramkerja'),
            'typepelaksanaan_idtypepelaksanaan' => $request->input('typepelaksanaan_idtypepelaksanaan'),
            'NamaPelaksanaan' => $request->input('NamaPelaksanaan'),
            'TanggalMulai' => $request->input('TanggalMulai'),
            'TanggalBerakhir' => $request->input('TanggalBerakhir'),
            'KeteranganPelaksanaan' => $request->input('KeteranganPelaksanaan'),
            'statuspelaksanaan_idstatuspelaksanaan' => $request->input('statuspelaksanaan_idstatuspelaksanaan'),
            'lock' => $request->input('lock')
        ]);
        // dd($babs);
        if ($pelaksanaanprogram) {
            # code...
            return redirect()->route('pelaksanaanprogram.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('pelaksanaanprogram.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $pelaksanaanprogram = pelaksanaanprogram::findOrFail($id);
        $pelaksanaanprogram->delete();

        return redirect()->route('pelaksanaanprogram.index');
    }
}
