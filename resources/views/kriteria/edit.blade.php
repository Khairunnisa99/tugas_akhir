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
      <form method="post" action="{{ route('kriteria.update', $kriteria->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="form-group">
            <label for="">Bab</label>
            {{-- <input type="text" name="NomorBab" id="" class="form-control" placeholder=""> --}}
            <select name="id_subbab" class="form-control">
               @foreach ($standar as $item)
                   <option value="{{ $item->id  }}">{{ $item->SubBabNama }}</option>
               @endforeach
            </select>
         </div>

          <div class="form-group">
            <label for="">Nomor</label>
            <input type="text" value="{{ $kriteria->NomerKriteria }}" name="NomerKriteria" class="form-control" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Nama Kriteria</label>
            <textarea name="namaKriteria" id="" cols="30" rows="5" class="form-control"> {{ $kriteria->namaKriteria }}</textarea>
          </div>

          <div class="form-group">
            <label for="">Maksud Dan Tujuan</label>
            <textarea name="MaksudDanTujuan" id="" cols="30" rows="5" class="form-control"> {{ $kriteria->MaksudDanTujuan }}</textarea>
          </div>


          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>
    </div>
 </div>
</div>
@endsection
