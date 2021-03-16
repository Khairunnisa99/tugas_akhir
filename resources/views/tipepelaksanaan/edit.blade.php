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

<form method="post" action="{{route('tipepelaksanaan.update', $tipepelaksanaan)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="tipepelaksanaan">Tipe Pelaksanann</label>
        <input type="text" class="form-control @error('tipepelaksanaan') is-invalid @enderror" id="tipepelaksanaan" placeholder="tipepelaksanaan" name="tipepelaksanaan" value="{{ $tipepelaksanaan->tipepelaksanaan }}">

            @error('tipepelaksanaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="keterangan" name="keterangan" value="{{ $keterangan->keterangan}}">
                @error('keterangan')
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
