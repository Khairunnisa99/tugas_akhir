<?php

namespace App\Http\Controllers;
use App\klinik;
use Illuminate\Http\Request;

class KlinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klinik= klinik::all();
        return view('klinik.index',['klinik'=>$klinik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klinik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(klinik $klinik)
    {
        return view('klinik.edit', compact('klinik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, klinik $klinik)
    {
        $request->validate([             
            'namaKlinik' => 'required',             
            'alamatKlinik' => 'required'         
           ]);                  
       klinik::where('idKlinik', $klinik->idKlinik)                 
       ->update([                    
            'namaKlinik' => $request->namaKlinik,                    
             'alamatKlinik' => $request->alamatKlinik,                                     
             ]);         
           return redirect('/klinik') 
       ->with ('status', 'Data Klinik Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
