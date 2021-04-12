@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Tambah Data')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="card-title">
       <h3>Tambah Data </h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('bab_dua.store') }}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
            <label for="">Standar</label>
            {{-- <input type="number" name="id_subbab" id="" class="form-control"> --}}
            <select name="id_subbab" class="form-control">
               @foreach ($standar as $item)
                   <option value="{{ $item->id }}">{{ $item->SubBabNama }}</option>
               @endforeach
            </select>
         </div>
          <div class="form-group">
            <label for="">Nomor Kriteria</label>
            <input type="text" name="NomerKriteria" class="form-control" placeholder="Nomor Kriteria">
          </div>
          <div class="form-group">
             <label for="">Nama Kriteria</label>
             <textarea class="form-control" name="namaKriteria" cols="30" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="">Maksud dan Tujuan</label>
            <textarea name="MaksudDanTujuan" class="form-control" cols="30" rows="5"></textarea>
          </div>
          


          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('bab_dua.index') }}" class="btn btn-danger">Kembali</a>

        </form>
    </div>
 </div>

@endsection
