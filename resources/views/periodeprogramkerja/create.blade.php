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

        <form method="post" action="{{ route('periodeprogramkerja.store') }}" enctype="multipart/form-data">

        @csrf
          <div class="form-group">
             <label for="TahunProgramKerja">Periode Program Kerja</label>
             <input type="text" class="form-control" id="TahunProgramKerja" placeholder="Masukan Periode" name="TahunProgramKerja">
          </div>
          <div class="form-group">
             <label for="DeskripsiPeriodeProgramKerja">Deskripsi</label>
             <input type="text" class="form-control" id="DeskripsiPeriodeProgramKerja" placeholder="Masukan Deskripsi" name="DeskripsiPeriodeProgramKerja">
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
