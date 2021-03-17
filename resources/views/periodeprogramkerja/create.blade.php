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

        <form method="post" action="/programkerja">
        @csrf
          <div class="form-group">
             <label for="NamaPeriodeProgramKerja">Nama Program Kerja</label>
             <input type="text" class="form-control" id="NamaPeriodeProgramKerja" placeholder="Masukan Nama Program Kerja" name="NamaPeriodeProgramKerja">
          </div>
          <div class="form-group">
             <label for="TahunProgramKerja">Periode</label>
             <input type="text" class="form-control" id="periode" placeholder="Masukan tahun" name="periode">
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
