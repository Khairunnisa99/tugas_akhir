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
        <form method="post" action="{{ route('bab.store') }}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
            <label for="">Nomor Bab</label>
            <input type="text" name="NomorBab" id="" class="form-control" placeholder="Nomor Bab">
            {{-- <select name="id_subbab" class="form-control">
               <option value="">Contoh</option>
            </select> --}}
         </div>
          <div class="form-group">
            <label for="">Kode Bab</label>
            <input type="text" name="KodeBab" class="form-control" placeholder="Kode Bab">
          </div>
          <div class="form-group">
             <label for="">Nama Bab</label>
             <input type="text" class="form-control" name="NamaBab" placeholder="Nama Bab">
          </div>
          <div class="form-group">
            <label for="">Gambaran Umum</label>
            <textarea type="text" class="form-control" name="GambaranUmum" cols="30" rows="5"></textarea>
         </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('bab.index') }}" class="btn btn-danger">Kembali</a>


        </form>
    </div>
 </div>

@endsection
