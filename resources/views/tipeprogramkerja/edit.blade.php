@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
    <div class="container mt-4">
    <div class="row"> <div class="col-8">
    <h1 class="mt-3">Form Ubah Data </h1>

<form method="post" action="{{route('tipeprogramkerja.update', $tipeprogramkerja)}}">
    @csrf
    @method('patch')
    <div class="form-group">

        <div class="form-group">
            <label for="">tipe program</label>
            <input type="text" name="tipeprogram" value="{{ $tipeprogramkerja->tipeprogram }}" id="" class="form-control">
         </div>
         <div class="form-group">
            <label for="">keterangan tipe</label>
            <textarea name="keterangantipe" id="" cols="30" rows="5" class="form-control"> {{ $tipeprogramkerja->keterangantipe }}</textarea>
         </div>

                   <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>

</div>
</div>
</div>
@endsection
