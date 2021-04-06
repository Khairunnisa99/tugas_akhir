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

<form method="post" action="{{route('periodeprogramkerja.update', $periodeprogramkerja)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="TahunProgramKerja">Nama Program Kerja</label>
        <input type="text" class="form-control @error('TahunProgramKerja') is-invalid @enderror" id="TahunProgramKerja" placeholder="TahunProgramKerja" name="TahunProgramKerja" value="{{ $periodeprogramkerja->TahunProgramKerja }}">

            @error('NamaPeriodeProgramKerja')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="DeskripsiPeriodeProgramKerja">Tanggal Mulai</label>
            <input type="text" class="form-control @error('DeskripsiPeriodeProgramKerja') is-invalid @enderror" id="DeskripsiPeriodeProgramKerja" placeholder="DeskripsiPeriodeProgramKerja" name="DeskripsiPeriodeProgramKerja" value="{{ $periodeprogramkerja->DeskripsiPeriodeProgramKerja }}">
                @error('DeskripsiPeriodeProgramKerja')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                        @enderror
        </div>

                   <button type="submit" class="btn btn-primary">Ubah Data</button>
                   <a href="{{ route('periodeprogramkerja.index') }}" class="btn btn-danger">Kembali</a>
</form>

</div>
</div>
</div>
@endsection
