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
        <form method="post" action="{{ route('bab.update', $babAkreditasi->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="form-group">
            <label for="">Nomor Bab</label>
            <input type="text" name="NomorBab" value="{{ $babAkreditasi->NomorBab }}" id="" class="form-control" placeholder="Nomor Bab">
            {{-- <select name="id_subbab" class="form-control">
               <option value="">Contoh</option>
            </select> --}}
         </div>
          <div class="form-group">
            <label for="">Kode Bab</label>
            <input type="text" name="KodeBab" value="{{ $babAkreditasi->KodeBab }}" class="form-control" placeholder="Kode Bab">
          </div>
          <div class="form-group">
             <label for="">Nama Bab</label>
             <input type="text" class="form-control" value="{{ $babAkreditasi->NamaBab }}" name="NamaBab" placeholder="Nama Bab">
          </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>

@endsection
