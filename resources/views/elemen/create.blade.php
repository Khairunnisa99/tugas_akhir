@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Tambah Data')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="card-title">
       <h3>Tambah Data </h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('elemen.store') }}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
            <label for="">kriteria</label>
            {{-- <input type="number" name="id_subbab" id="" class="form-control"> --}}
           <select name="SubSubBab_idSubSubBab" class="form-control">
                @foreach ($kriteria as $std)
                    <option value="{{$std->id}}">{{$std->namaKriteria}}</option>
                @endforeach
           </select>

         </div>
          <div class="form-group">
            <label for="">Nomor elemen</label>
            <input type="text" name="NoElemen" class="form-control" placeholder="Nomor elemen">
          </div>
          <div class="form-group">
             <label for="">Elemen penilaian</label>
             <textarea class="form-control" name="ElemenPenilaian" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="">Telusur Sasaran</label>
            <textarea name="TelusurSasaran" class="form-control" cols="30" rows="5"></textarea>
          </div>

          <div class="form-group">
             <label for="">Materi Telusur</label>
             <textarea class="form-control" name="MateriTelusur" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="">Dokumen Internal</label>
            <textarea name="DokumentInternal" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="">Dokumen Enternal</label>
            <textarea name="DokumenEksternal" class="form-control" cols="30" rows="5"></textarea>
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>

@endsection
