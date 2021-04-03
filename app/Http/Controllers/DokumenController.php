<?php

namespace App\Http\Controllers;

use App\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:dokumen.index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = dokumen::latest()->when(request()->q, function ($dokumen) {
            $dokumen = $dokumen->where('namaDokumen','like', '%' . request()->q . '%');
        })->paginate(5);
        return view('dokumen.index', ['dokumen' => $dokumen]);

    }

    public function getFile($filename)
    {
        $file = Storage::disk('public/surat_dokumen')->get($filename);

        return (new Response($file, 200))
            ->header('Content-Type', 'surat_dokumen/pdf');
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
            //'keterangan' => 'required',
            'file' => 'required|mimes:pdf,doc, docx'
        ]);
        $file = $request->file('file');
        $file->storeAs('public/surat_dokumen/', $file->getClientOriginalName());
        $dokumen = dokumen::create([
            'namaDokumen' => $request->input('namaDokumen'),
            'keterangan' => $request->input('keterangan'),
            'file' => $file->getClientOriginalName(),

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


        $dokumen = DB::table('dokumen')

            ->where('dokumen.id', $id)
            ->get();
        // dd($standar);
        return view('dokumen.show', compact('dokumen'));

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
        // dd($request);
        $this->validate($request, [
            'namaDokumen' => 'required',
            'keterangan' => 'required'
        ]);


        if (empty($request->file('file'))) {
            $dokumen = dokumen::findOrFail($id);
            $dokumen->update([
                'namaDokumen' => $request->input('namaDokumen'),
                'keterangan' => $request->input('keterangan')
            ]);
        } else {
            Storage::disk('local')->delete('public/surat_dokumen' . $id);

            $dokumen = dokumen::findOrFail($id);
            $file = $request->file('file');
            $file->storeAs('public/surat_dokumen/', $file->getClientOriginalName());

            $dokumen->update([
                'namaDokumen' => $request->input('namaDokumen'),
                'keterangan' => $request->input('keterangan'),
                'file' => $file->getClientOriginalName(),

            ]);
        }
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
