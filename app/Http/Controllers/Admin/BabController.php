<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $babAkreditasi = Bab::latest()->paginate(10);

        return view('bab.index', compact('babAkreditasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bab.create');
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
            'NomorBab' => 'required',
            'KodeBab' => 'required',
            'NamaBab' => 'required'
        ]);

        $babAkreditasi = Bab::create([
            'NomorBab' => $request->input('NomorBab'),
            'KodeBab' => $request->input('KodeBab'),
            'NamaBab' => $request->input('NamaBab'),
            'lock' => $request->input('lock'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi')
        ]);
            // dd($babs);
        if ($babAkreditasi) {
            # code...
            return redirect()->route('bab.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('bab.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $babAkreditasi = DB::table('babAkreditasi')

            ->where('babAkreditasi.id', $id)
            ->get();
        // dd($standar);
        return view('bab.show', compact('babAkreditasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $babAkreditasi = Bab::find($id);

        return view('bab.edit', compact('babAkreditasi'));
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
            'NomorBab' => 'required',
            'KodeBab' => 'required',
            'NamaBab' => 'required'
        ]);
        $babAkreditasi = Bab::findOrFail($id);
        $babAkreditasi->update([
            'NomorBab' => $request->input('NomorBab'),
            'KodeBab' => $request->input('KodeBab'),
            'NamaBab' => $request->input('NamaBab'),
            'lock' => $request->input('lock'),
            'periodeakreditasi_idperiodeakreditasi' => $request->input('periodeakreditasi_idperiodeakreditasi')
        ]);

        if ($babAkreditasi) {
            # code...
            return redirect()->route('bab.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('bab.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $bab = Bab::findOrFail($id);
        $bab->delete();

        return redirect()->route('bab.index');
    }
}
