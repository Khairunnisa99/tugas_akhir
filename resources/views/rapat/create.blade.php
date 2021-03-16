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

        <form method="post" action="{{route('rapat.store')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
             <label for="namaRapat">Nama Rapat</label>
             <input name="namaRapat" class="form-control" cols="30" rows="2"></textarea>
          </div>
          <div class="form-group">
             <label for="WaktuRapat">Waktu Rapat</label>
             <input type="date" class="form-control" name="WaktuRapat">
          </div>    
          <div class="form-group">
            <label for="KeteranganRapat">Agenda Rapat</label>
            <textarea name="KeteranganRapat" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="PesertaRapat">Peserta Rapat</label>
            <textarea name="PesertaRapat" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="MateriRapat">Materi Rapat</label>
            <textarea name="MateriRapat" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="NotulenRapat">Notulen Rapat</label>
            <textarea name="NotulenRapat" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="Rekomendasi">Rekomendasi</label>
            <textarea name="Rekomendasi" class="form-control" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="TindakLanjut">Tindak Lanjut</label>
            <textarea name="TindakLanjut" class="form-control" cols="30" rows="5"></textarea>
          </div>



          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
