@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Edit Data')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="card-title">
       <h3>Edit Data </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('elemen.update', $elemen->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="form-group">
            <label for="">Bab</label>
            {{-- <input type="text" name="NomorBab" id="" class="form-control" placeholder=""> --}}
            <select name="SubSubBab_idSubSubBab" class="form-control">
               @foreach ($kriteria as $item)
                   <option value="{{ $item->id  }}">{{ $item->namaKriteria }}</option>
               @endforeach
            </select>
         </div>

          <div class="form-group">
            <label for="">Nomor elemen</label>
            <input type="text" value="{{ $elemen->NoElemen }}" name="NoElemen" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Elemen penilaian</label>
            <input type="text" value="{{ $elemen->ElemenPenilaian }}" name="ElemenPenilaian" class="form-control" placeholder="">
          </div>
          <div class="form-group">
             <label for="">Telusur Sasaran</label>
             <input type="text" value="{{ $elemen->TelusurSasaran }}" class="form-control" name="TelusurSasaran" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Materi Telusur</label>
            <input type="text" value="{{ $elemen->MateriTelusur }}" name="MateriTelusur" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Dokument Internal</label>
            <input type="text" value="{{ $elemen->DokumentInternal }}" name="DokumentInternal" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Dokument External</label>
            <input type="text" value="{{ $elemen->DokumenEksternal }}" name="DokumenEksternal" class="form-control" placeholder="">
          </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>
</div>
@endsection
