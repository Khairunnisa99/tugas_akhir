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

        <form method="post" action="{{ route('tipeprogramkerja.store') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
             <label for="tipeprogram">Tipe Program</label>
             <input type="text" class="form-control" id="tipeprogram" placeholder="Masukan Tipe Program Kerja" name="tipeprogram">
          </div>
          <div class="form-group">
             <label for="keterangantipe">Keterangan Tipe</label>
             <textarea name="keterangantipe" id="" cols="30" rows="5" class="form-control"></textarea>
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('tipeprogramkerja.index') }}" class="btn btn-danger">Kembali</a>

        </form>


    </div>
 </div>

</div>
@endsection
