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
      <form method="post" action="{{ route('standar.store') }}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
            <label for="">Bab</label>
            {{-- <input type="text" name="NomorBab" id="" class="form-control" placeholder=""> --}}
            <select name="BabAkreditasi_idBabAkreditasi" class="form-control">
               @foreach ($bab as $item)
                   <option value="{{ $item->id  }}">{{ $item->NamaBab }}</option>
               @endforeach
            </select>
         </div>
          <div class="form-group">
            <label for="">Nomor</label>
            <input type="text" name="SubBabNomor" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="SubBabNama" class="form-control" placeholder="">
          </div>
          <div class="form-group">
             <label for="">Standar</label>
             <input type="text" class="form-control" name="SubBabStandard" placeholder="">
          </div>
           <div class="form-group">
             <label for="">Deskripsi</label>
             <textarea type="text" class="form-control" name="SubBabDeskripsi" cols="30" rows="5"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>
</div>
@endsection
