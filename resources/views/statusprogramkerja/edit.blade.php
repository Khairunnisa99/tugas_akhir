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

<form method="post" action="{{route('statusprogramkerja.update', $statusprogramkerja)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="statusProker">Nama Status</label>
        <input type="text" class="form-control @error('statusProker') is-invalid @enderror" id="statusProker" placeholder="statusProker" name="statusProker" value="{{ $statusprogramkerja->statusProker }}">

            @error('statusProker')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="keteranganStatus">Keterangan Status</label>
            <input type="text" class="form-control @error('keteranganStatus') is-invalid @enderror" id="keteranganStatus" placeholder="keteranganStatus" name="keteranganStatus" value="{{ $statusprogramkerja->keteranganStatus }}">
                @error('keteranganStatus')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                        @enderror
        </div>

                   <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>

</div>
</div>
</div>
@endsection
