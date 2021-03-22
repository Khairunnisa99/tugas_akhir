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

        <form method="post" action="{{ route('periodeakreditasi.store') }}" enctype="multipart/form-data">
        @csrf


          <div class="form-group">
            <label for="">Nama PeriodeAkreditasi</label>
            <input type="text"  name="namaPeriodeAkreditasi" class="form-control" placeholder="Nama priode akreditasi">
         </div>
          <div class="form-group">
             <label for="">Tahun ProgramAkreditasi</label>
             <input type="text"  name="tahunProgramAkreditasi" class="form-control" placeholder="Tahun priode akreditasi">
          </div>
          <div class="form-group">
             <label for="">Tanggal Mulai</label>
             <input type="date" name="TanggalMulai" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tanggal Berakhir</label>
            <input type="date" name="TanggalBerakhir" id="" class="form-control">
         </div>
          <div class="form-group">
            <label for="">Deskripsi PeriodeAkreditasi</label>
            <textarea name="deskripsiPeriodeAkreditasi" id="" cols="30" rows="5" class="form-control"></textarea>
         </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
