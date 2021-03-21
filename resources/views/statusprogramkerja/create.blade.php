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

        <form method="post" action="{{ route('statusprogramkerja.store') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
             <label for="statusProker">Status Proker</label>
             <input type="text" class="form-control"  placeholder="Masukan Status" name="statusProker">
          </div>
          <div class="form-group">
             <label for="keteranganStatus">Keterangan Status</label>

             <textarea name="keteranganStatus" id="" cols="30" rows="5" class="form-control"></textarea>

          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
