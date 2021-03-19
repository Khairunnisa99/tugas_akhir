<?php

namespace App\Http\Controllers;

use App\dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = dokumen::latest()->when(request()->q, function ($dokumen) {
            $dokumen = $dokumen->where(
                'namaDokumen',
                'like',
                '%' . request()->q . '%'
            );
        })->paginate(5);
        return view('dokumen.index', ['dokumen' => $dokumen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dokumen::create($request->all());
        //return redirect('/dokumen')->with('status', 'Dokumen berhasil ditambahkan');
        $this->validate($request, [
            'namaDokumen' => 'required',
            'keterangan' => 'required'
        ]);

        $dokumen = dokumen::create([
            'namaDokumen' => $request->input('namaDokumen'),
            'keterangan' => $request->input('keterangan'),

        ]);
        // dd($babs);
        if ($dokumen) {
            # code...
            return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $dokumen = dokumen::findOrFail($id);
        return view('dokumen.edit', compact('dokumen'));
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
            'namaDokumen' => 'required',
            'keterangan' => 'required'
        ]);
        $dokumen = dokumen::findOrFail($id);
        $dokumen->update([
            'namaDokumen' => $request->input('namaDokumen'),
            'keterangan' => $request->input('keterangan')
        ]);
        if ($dokumen) {
            # code...
            return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
            return redirect()->route('dokumen.index')->with(['error' => 'Data Gagal DiUpdate']);
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
        $dokumen = dokumen::findOrFail($id);
        $dokumen->delete();

        return redirect()->route('dokumen.index');
    }
    // public function search(Request $request)
    // {   $cari = $request->search;
    //     $post = DB::table('dokumen')
    //     ->where('namaDokumen','like',"%".$cari."%")
    //     ->paginate();

    //     return view('dokumen.index',['dokumen' => $post]);

    //   }
}
