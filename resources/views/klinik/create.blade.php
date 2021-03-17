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

        <form method="post" action="{{route('klinik.store')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
             <label for="namaKlinik">Nama Klinik</label>
             <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Klinik" name="namaKlinik">
          </div>
          <div class="form-group">
             <label for="alamatKlinik">Alamat Klinik</label>
             <input type="text" class="form-control" id="nim" placeholder="Masukan Alamat Klinik" name="alamatKlinik">
          </div>
          <div class="form-group">
            <label for="webKlinik">Web Klinik</label>
            <input type="text" class="form-control" id="nim" placeholder="Masukan Web Klinik" name="webKlinik">
         </div>
         <div class="form-group">
            <label for="telponKlinik">Telpon Klinik</label>
            <input type="text" class="form-control" id="nim" placeholder="Masukan telpon Klinik" name="telponKlinik">
         </div>
         <div class="form-group">
            <label for="logo">Logo Klinik</label>
            <input type="file" class="form-control" name="logo">
         </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
