<?php

namespace App\Http\Controllers;

use App\tipepelaksanaan;
use Illuminate\Http\Request;
use App\tipeprogramkerja;
use Illuminate\Support\Facades\DB;

class TipeprogramkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipeprogramkerja = tipeprogramkerja::latest()->when(request()->q, function ($tipeprogramkerja) {
            $tipeprogramkerja = $tipeprogramkerja->where(
                'tipeprogram',
                'like',
                '%' . request()->q . '%'
            );
        })->paginate(10);
        return view('tipeprogramkerja.index', ['tipeprogramkerja' => $tipeprogramkerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipeprogramkerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipeprogram' => 'required',
            'keterangantipe' => 'required'

        ]);
        $tipeprogramkerja = tipeprogramkerja::create([
            'tipeprogram' => $request->tipeprogram,
            'keterangantipe' => $request->keterangantipe
        ]);
        if ($tipeprogramkerja) {
            # code...
            return redirect()->route('tipeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('tipeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $tipeprogramkerja = DB::table('tipeprogramkerja')

            ->where('tipeprogramkerja.id', $id)
            ->first();
        // dd($standar);
        return view('tipeprogramkerja.show', compact('tipeprogramkerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipeprogramkerja = tipeprogramkerja::find($id);

        return view('tipeprogramkerja.edit', compact('tipeprogramkerja'));
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
            'tipeprogram' => 'required',
            'keterangantipe' => 'required'

        ]);
        $tipeprogramkerja = tipeprogramkerja::findOrFail($id);
        $tipeprogramkerja->update([
            'tipeprogram' => $request->tipeprogram,
            'keterangantipe' => $request->keterangantipe
        ]);
        if ($tipeprogramkerja) {
            # code...
            return redirect()->route('tipeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('tipeprogramkerja.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $tipeprogramkerja = tipeprogramkerja::findOrFail($id);
        $tipeprogramkerja->delete();

        return redirect()->route('tipeprogramkerja.index');
    }
}
