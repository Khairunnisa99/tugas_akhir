<?php

namespace App\Http\Controllers;
use App\klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
        $this->validate($request, [
            'namaKlinik' => 'required',
            'alamatKlinik' => 'required',
            'webKlinik' => 'required',
            'telponKlinik' => 'required',
            'logo' => 'required|image',

        ]);

        // syntax upload file image
        $image = $request->file('logo');
        $image->storeAs('public/klinik/', $image->hashName());


        $klinik = klinik::create([
            'namaKlinik' => $request->input('namaKlinik'),
            'alamatKlinik' => $request->input('alamatKlinik'),
            'webKlinik' => $request->input('webKlinik'),
            'telponKlinik' => $request->input('telponKlinik'),
            'logo' => $image->hashName()

        ]);
            // dd($babs);
        if ($klinik) {
            # code...
            return redirect()->route('klinik.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('klinik.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $klinik = klinik::findOrFail($id);
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
            'alamatKlinik' => 'required',
            'webKlinik' => 'required',
            'telponKlinik' => 'required',
            // 'logo' => 'required'
        ]);

        if(empty($request->file('logo'))){
            $klinik = klinik::findOrFail($klinik->id);
            $klinik->update([
                'namaKlinik' => $request->input('namaKlinik'),
                'alamatKlinik' => $request->input('alamatKlinik'),
                'webKlinik' => $request->input('webKlinik'),
                'telponKlinik' => $request->input('telponKlinik'),
                // 'logo' => $request->input('logo')
            ]);
        }else{
            // remove foto
            Storage::disk('local')->delete('public/klinik' . $klinik->logo);

             // syntax upload file image
            $image = $request->file('logo');
            $image->storeAs('public/klinik/', $image->hashName());

            $klinik = klinik::findOrFail($klinik->id);
            $klinik->update([
                'namaKlinik' => $request->input('namaKlinik'),
                'alamatKlinik' => $request->input('alamatKlinik'),
                'webKlinik' => $request->input('webKlinik'),
                'telponKlinik' => $request->input('telponKlinik'),
                'logo' => $image->hashName()

            ]);
        }


        if ($klinik) {
                # code...
             return redirect()->route('klinik.index')->with(['success' => 'Data Berhasil DiUpdate']);
        } else {
                return redirect()->route('klinik.index')->with(['error' => 'Data Gagal DiUpdate']);
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
        $klinik = klinik::findOrFail($id);
        Storage::disk('local')->delete('public/klinik' . $klinik->logo);
        $klinik->delete();

        return redirect()->route('klinik.index');
    }
    public function search(Request $request)
    {   $cari = $request->search;
        $post = DB::table('klinik')
        ->where('namaKlinik','like',"%".$cari."%")
        ->paginate();

        return view('klinik.index',['klinik' => $post]);

      }
}
