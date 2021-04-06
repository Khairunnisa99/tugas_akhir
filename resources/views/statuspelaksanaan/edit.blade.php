@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
    <div class="container mt-4">
    <div class="row"> <div class="col-8">
    <h1 class="mt-3">Form Ubah Data Status Kerja</h1>

<form method="post" action="{{route('statuspelaksanaan.update', $statuspelaksanaan)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="statusPelaksanaan">Nama Status</label>
        <input type="text" class="form-control @error('statusPelaksanaan') is-invalid @enderror"  placeholder="statusPelaksanaan" name="statusPelaksanaan" value="{{ $statuspelaksanaan->statusPelaksanaan }}">

            @error('tatusPelaksanaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
    <div class="form-group">
        <label for="">keteranganStatus</label>
        <textarea name="keteranganStatus" id="" cols="30" rows="5" class="form-control"> {{ $statuspelaksanaan->keteranganStatus }}</textarea>
     </div>

                   <button type="submit" class="btn btn-primary">Ubah Data</button>
                   <a href="{{ route('statuspelaksanaan.index') }}" class="btn btn-danger">Kembali</a>
</form>

</div>
</div>
</div>
@endsection
