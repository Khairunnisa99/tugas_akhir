@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
    <div class="container mt-4">
    <div class="row"> <div class="col-8">
    <h1 class="mt-3">Form Ubah Data Dokumen</h1>

<form method="post" action="{{route('tipeprogramkerja.update', $tipeprogramkerja)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="tipeprogram">Tipe Program</label>
        <input type="text" class="form-control @error('tipeprogram') is-invalid @enderror" id="tipeprogram" placeholder="tipeprogram" name="tipeprogram" value="{{ $tipeprogramkerja->tipeprogram }}">

            @error('tipeprogram')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="keterangantipe">Keterangan</label>
            <input type="text" class="form-control @error('keterangantipe') is-invalid @enderror" id="keterangantipe" placeholder="keterangantipe" name="keterangantipe" value="{{ $tipeprogramkerja->keterangantipe}}">
                @error('keterangantipe')
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
