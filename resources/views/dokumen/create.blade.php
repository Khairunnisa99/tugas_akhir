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

        <form method="post" action="{{ route('dokumen.store') }}" enctype="multipart/form-data">

        @csrf
          <div class="form-group">
             <label for="namaDokumen">Nama Dokumen</label>
             <input type="text" class="form-control"  placeholder="Masukan Nama Dokumen" name="namaDokumen" required>
          </div>
          <div class="form-group">
             <label for="keterangan">Keterangan</label>
             <input type="text" class="form-control"  placeholder="Masukan Keterangan" name="keterangan" required>
          </div>
          <div class="form-group">
             <label for="">File Surat</label>
             <br><small>Format: pdf/docx/doc/pptx</small>
             <input type="file" class="form-control" name="file" value="" required>

          </div>
          <div class="form-group">
            <label for="poto">Poto</label>
            <br><small>Format: jpeg/png/jpg</small>
            <input type="file" class="form-control" name="poto">
         </div>



          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('dokumen.index') }}" class="btn btn-danger">Kembali</a>

        </form>


    </div>
 </div>

</div>
@endsection
