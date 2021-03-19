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
        <label for="namaTypePelaksanaan">Tipe Pelaksanann</label>
        <input type="text" class="form-control @error('namaTypePelaksanaan') is-invalid @enderror"  placeholder="nama tipe pelaksanaan" name="namaTypePelaksanaan" value="{{ $tipepelaksanaan->namaTypePelaksanaan }}">

            @error('namaTypePelaksanaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"  placeholder="keterangan" name="keterangan" value="{{ $tipepelaksanaan->keterangan}}">
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
