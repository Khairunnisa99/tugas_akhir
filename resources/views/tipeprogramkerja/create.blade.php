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

        <form method="post" action="/tipeprogramkerja">
        @csrf
          <div class="form-group">
             <label for="tipeprogram">Tipe Program</label>
             <input type="text" class="form-control" id="tipeprogram" placeholder="Masukan Tipe Program Kerja" name="tipeprogram">
          </div>
          <div class="form-group">
             <label for="keterangantipe">Keterangan Tipe</label>
             <input type="text" class="form-control" id="keterangantipe" placeholder="Masukan keterangan" name="keterangantipe">
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
