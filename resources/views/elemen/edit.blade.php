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
            <label for="">Kriteria</label>
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
            <textarea name="ElemenPenilaian" id="" cols="30" rows="5" class="form-control"> {{ $elemen->ElemenPenilaian }}</textarea>
         </div>

         <div class="form-group">
          <label for="">Telusur Sasaran</label>
          <textarea name="TelusurSasaran" id="" cols="30" rows="5" class="form-control"> {{ $elemen->TelusurSasaran }}</textarea>
         </div>

         <div class="form-group">
          <label for="">Materi Telusur</label>
          <textarea name="MateriTelusur" id="" cols="30" rows="5" class="form-control"> {{ $elemen->MateriTelusur }}</textarea>
         </div>

         <div class="form-group">
          <label for="">Dokument Internal</label>
          <textarea name="DokumentInternal" id="" cols="30" rows="5" class="form-control"> {{ $elemen->DokumentInternal }}</textarea>
         </div>

         <div class="form-group">
          <label for="">Dokument External</label>
          <textarea name="DokumenEksternal" id="" cols="30" rows="5" class="form-control"> {{ $elemen->DokumenEksternal }}</textarea>
         </div>

         <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                  <label for="">Dokumen</label>
                  <select class="selectpicker form-control" name="dokumen[]" multiple data-live-search="true">
                      <option data-icon="icon-heart" disabled></option>
                      @foreach ($dokumen as $item)
                            <option value="{{ $item->id }}">{{ $item->file }} </option>
                        @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>
</div>
@endsection
