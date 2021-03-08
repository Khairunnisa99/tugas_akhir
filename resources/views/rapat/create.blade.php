@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="col-8">
        <h1 class="mt-10">Tambah Data </h1>

        <form method="post" action="/klinik">
        @csrf
          <div class="form-group">
             <label for="namaRapat">Nama Rapat</label>
             <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Rapat" name="namaRapat">
          </div>
          <div class="form-group">
             <label for="waktuRapat">Waktu Rapat</label>
             <input type="text" class="form-control" id="nim" placeholder="Masukan Waktu Rapatk" name="waktuRapat">
          </div>
        

          <button type="submit" class="btn btn-primary">Simpan Data</button>
                
        </form>


    </div>
 </div>

</div>
@endsection