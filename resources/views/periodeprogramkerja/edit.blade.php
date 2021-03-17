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

<form method="post" action="{{route('periode.update', $periodeprogramkerja)}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="NamaPeriodeProgramKerja">Nama Program Kerja</label>
        <input type="text" class="form-control @error('NamaPeriodeProgramKerja') is-invalid @enderror" id="NamaPeriodeProgramKerja" placeholder="NamaPeriodeProgramKerja" name="NamaProgramKerja" value="{{ $periodeprogramkerja->NamaPeriodeProgramKerja }}">

            @error('NamaPeriodeProgramKerja')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                    @enderror
    </div>
        <div class="form-group">
            <label for="tanggalMulai">Tanggal Mulai</label>
            <input type="text" class="form-control @error('tanggalMulai') is-invalid @enderror" id="tanggalMulai" placeholder="tanggalMulai" name="tanggalMulai" value="{{ $programkerja->tanggalMulai }}">
                @error('tanggalMulai')
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
