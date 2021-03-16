@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Edit Data')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="card-title">
       <h3>Edit Data </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('rapat.update', $rapat->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="form-group">
            <label for="">Edit Rapat</label>
            {{-- <input type="text" name="NomorBab" id="" class="form-control" placeholder=""> --}}
         </div>
          <div class="form-group">
            <label for="">Nama Rapat</label>
            <input type="text" value="{{ $rapat->namaRapat }}" name="namaRapat" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">WaktuRapat</label>
            <input type="datetime-local" value="{{ $rapat->WaktuRapat }}" name="WaktuRapat" class="form-control" placeholder="">
          </div>
          <div class="form-group">
             <label for="">Agenda Rapat</label>
             <input type="text" value="{{ $rapat->KeteranganRapat }}" class="form-control" name="KeteranganRapat" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Peserta Rapat</label>
            <input type="text" value="{{ $rapat->PesertaRapat }}" class="form-control" name="PesertaRapat" placeholder="">
         </div>
         <div class="form-group">
            <label for="">Materi Rapat</label>
            <input type="text" value="{{ $rapat->MateriRapat }}" class="form-control" name="MateriRapat" placeholder="">
         </div>
         <div class="form-group">
            <label for="">Notulen Rapat</label>
            <input type="text" value="{{ $rapat->NotulenRapat }}" class="form-control" name="NotulenRapat" placeholder="">
         </div>
         <div class="form-group">
            <label for="">Rekomendasi</label>
            <input type="text" value="{{ $rapat->Rekomendasi }}" class="form-control" name="Rekomendasi" placeholder="">
         </div>
         <div class="form-group">
            <label for="">Tindak Lanjut</label>
            <input type="text" value="{{ $rapat->TindakLanjut }}" class="form-control" name="TindakLanjut" placeholder="">
         </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>
</div>
@endsection
