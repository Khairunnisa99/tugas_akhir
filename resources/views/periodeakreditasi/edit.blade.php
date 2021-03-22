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
        <h1 class="mt-10">Edit Data </h1>

        <form action="{{ route('periodeakreditasi.update', $periodeakreditasi->id) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <div class="form-group">
             <label for="">Nama PeriodeAkreditasi</label>
             <input type="text"  name="namaPeriodeAkreditasi" value="{{ $periodeakreditasi->namaPeriodeAkreditasi }}" class="form-control" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Tahun ProgramAkreditasi</label>
            <input type="text"  name="tahunProgramAkreditasi" value="{{ $periodeakreditasi->tahunProgramAkreditasi }}" class="form-control" placeholder="">
         </div>

          <div class="form-group">
             <label for="">Tanggal Mulai</label>
             <input type="date" name="TanggalMulai" value="{{ $periodeakreditasi->TanggalMulai }}" id="" class="form-control">
          </div>

          <div class="form-group">
             <label for="">Tanggal Berakhir</label>
             <input type="date" name="TanggalBerakhir" value="{{ $periodeakreditasi->TanggalBerakhir }}" id="" class="form-control">
          </div>

          <div class="form-group">
             <label for="">Deskripsi PeriodeAkreditasi</label>
             <textarea name="deskripsiPeriodeAkreditasi" id="" cols="30" rows="5" class="form-control"> {{ $periodeakreditasi->deskripsiPeriodeAkreditasi }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
