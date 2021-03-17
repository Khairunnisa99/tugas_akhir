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

        <form method="post" action="/statusprogramkerja">
        @csrf
          <div class="form-group">
             <label for="statusProker">Status Proker</label>
             <input type="text" class="form-control" id="statusProker" placeholder="Masukan Status" name="statusProker">
          </div>
          <div class="form-group">
             <label for="keteranganStatus">Keterangan Status</label>
             <input type="text" class="form-control" id="keteranganStatus" placeholder="Masukan Keterangan" name="keteranganStatus">
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
