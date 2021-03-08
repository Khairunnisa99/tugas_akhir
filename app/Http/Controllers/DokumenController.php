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
        $dokumen= dokumen::paginate(10);
        return view('dokumen.index',['dokumen'=>$dokumen]);
        
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
        dokumen::create($request->all()); 
        return redirect('/dokumen') ->with ('status', 'Dokumen berhasil ditambahkan');
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
    public function edit(dokumen $dokumen)
    {
        return view('dokumen.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokumen $dokumen)
    {
        $request->validate([             
            'namaDokumen' => 'required',             
            'keterangan' => 'required'         
           ]);                  
       dokumen::where('idDokumen', $dokumen->idDokumen)                 
       ->update([                    
            'namaDokumen' => $request->namaDokumen,                    
             'keterangan' => $request->keterangan,                                     
             ]);         
           return redirect('/dokumen') 
       ->with ('status', 'Data Mahasiswa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('dokumen')->where('id', $id)->destroy();
        return redirect('dokumen')->with('status','berhasil dihapus!');
    }
}
