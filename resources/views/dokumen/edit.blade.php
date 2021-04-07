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

        <form action="{{ route('dokumen.update', $dokumen->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
          <div class="form-group">
             <label for="">Nama Dokumen</label>
             <input type="text" class="form-control" value="{{ $dokumen->namaDokumen }}" placeholder="Masukan Nama Dokumen" name="namaDokumen">
          </div>
          <div class="form-group">
             <label for="">Keterangan</label>
             <input type="text" class="form-control" value="{{ $dokumen->keterangan }}" placeholder="Masukan Keterangan" name="keterangan">
          </div>
          <div class="form-group">
             <label for="">File Surat</label>
             <br><small>Format: pdf/docx/doc/pptx</small>
             @if(isset($dokumen->file))
                <input type="file" class="form-control" name="file" value="{{ $dokumen->file }}"> {{ $dokumen->file }}
            @endif
          </div> 
          <div class="form-group">
             <label for="">Foto</label>
             <br><small>Format: jpeg/png/jpg</small>
             <input type="file" class="form-control" name="poto" value="{{ $dokumen->poto }}">
             <img src="{{ Storage::url('dokumen/' . $dokumen->poto) }}" width="100px">
          </div>


          <button type="submit" class="btn btn-primary">Update Data</button>
          <a href="{{ route('dokumen.index') }}" class="btn btn-danger">Kembali</a>

        </form>


    </div>
 </div>

</div>
@endsection
