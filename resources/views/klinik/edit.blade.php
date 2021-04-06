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
       <h3>Edit klinik </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('klinik.update', $klinik->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

          <div class="form-group">
            <label for="">Nama Klinik</label>
            <input type="text" value="{{ $klinik->namaKlinik }}" name="namaKlinik" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Alamat Klinik</label>
            <input type="text" value="{{ $klinik->alamatKlinik }}" name="alamatKlinik" class="form-control" placeholder="">
          </div>
          <div class="form-group">
             <label for="">Web Klinik</label>
             <input type="text" value="{{ $klinik->webKlinik }}" class="form-control" name="webKlinik" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Telpon Klinik</label>
            <input type="text" value="{{ $klinik->telponKlinik }}" class="form-control" name="telponKlinik" placeholder="">
         </div>
         <div class="form-group">
            <label for="">logo</label>
            <input type="file" class="form-control" name="logo">
         </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('klinik.index') }}" class="btn btn-danger">Kembali</a>

        </form>
    </div>
 </div>
</div>
@endsection
