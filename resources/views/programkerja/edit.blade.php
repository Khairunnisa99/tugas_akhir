@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="col-8">
        <h1 class="mt-10">Edit Data </h1>

        <form action="{{ route('programkerja.update', $programkerja->id) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
             <label for="">Nama Program Kerja</label>
             <input type="text"  name="NamaProgramKerja" value="{{ $programkerja->NamaProgramKerja }}" class="form-control" placeholder="Masukan Nama Program Kerja">
          </div>
          <div class="form-group">
             <label for="">Periode Program Kerja</label>
             <select name="periodeprogramkerja_idperiodeprogramkerja" class="form-control">
                @foreach ($periode as $data)
                    <option value="{{ $data->id }}">{{ $data->TahunProgramKerja }}</option>
                @endforeach
             </select>
          </div>
          <div class="form-group">
             <label for="">Tipe Program Kerja</label>
             <select name="tipeprogramkerja_idtipeprogramkerja" class="form-control">
                @foreach ($tipe as $data)
                    <option value="{{ $data->id }}">{{ $data->tipeprogram }}</option>
                @endforeach
             </select>
          </div>
          <div class="form-group">
             <label for="">Tanggal Mulai</label>
             <input type="date" name="tanggalMulai" value="{{ $programkerja->tanggalMulai }}" id="" class="form-control">
          </div>
          <div class="form-group">
             <label for="">Tanggal Berakhir</label>
             <input type="date" name="tanggalBerakhir" value="{{ $programkerja->tanggalBerakhir }}" id="" class="form-control">
          </div>
          <div class="form-group">
             <label for="">Deskripsi</label>
             <textarea name="DeskripsiProgramKerja" id="" cols="30" rows="5" class="form-control"> {{ $programkerja->DeskripsiProgramKerja }}</textarea>
          </div>
          <div class="form-group">
             <label for="">Status Pelaksanaan</label>
             <select name="statusprogramkerja_idstatusprogramkerja" class="form-control">
                @foreach ($pelaksanaan as $data)
                    <option value="{{ $data->id }}">{{ $data->statusProker }}</option>
                @endforeach
             </select>
          </div>



          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('programkerja.index') }}" class="btn btn-danger">Kembali</a>

        </form>


    </div>
 </div>

</div>
@endsection
