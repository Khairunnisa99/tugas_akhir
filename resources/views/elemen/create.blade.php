@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Tambah Data')
  @section('page-title','Elemen')
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
            <label for="">Dokumen External</label>
            <textarea name="DokumenEksternal" class="form-control" cols="30" rows="5"></textarea>
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
        <a href="{{ route('elemen.index') }}" class="btn btn-danger">Kembali</a>

        </form>

    </div>

 </div>


@endsection


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
