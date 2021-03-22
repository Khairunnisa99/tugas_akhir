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

        <form action="{{ route('pelaksanaanprogram.update', $pelaksanaanprogram->id) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">Nama Program</label>
            <select name="programkerja_idprogramkerja" class="form-control">
               @foreach ($programkerja as $data)
                   <option value="{{ $data->id }}">{{ $data->NamaProgramKerja }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label for="">Periode Program Kerja</label>
            <select name="typepelaksanaan_idtypepelaksanaan" class="form-control">
               @foreach ($tipepelak as $data)
                   <option value="{{ $data->id }}">{{ $data->namaTypePelaksanaan }}</option>
               @endforeach
            </select>
         </div>

          <div class="form-group">
             <label for="">Nama Pelaksanaan</label>
             <input type="text"  name="NamaPelaksanaan" value="{{ $pelaksanaanprogram->NamaPelaksanaan }}" class="form-control" placeholder="Masukan Nama Pelaksanaan">
          </div>

          <div class="form-group">
             <label for="">Tanggal Mulai</label>
             <input type="date" name="TanggalMulai" value="{{ $pelaksanaanprogram->TanggalMulai }}" id="" class="form-control">
          </div>

          <div class="form-group">
             <label for="">Tanggal Berakhir</label>
             <input type="date" name="TanggalBerakhir" value="{{ $pelaksanaanprogram->TanggalBerakhir }}" id="" class="form-control">
          </div>

          <div class="form-group">
             <label for="">Keterangan Pelaksanaan</label>
             <textarea name="KeteranganPelaksanaan" id="" cols="30" rows="5" class="form-control"> {{ $pelaksanaanprogram->KeteranganPelaksanaan }}</textarea>
          </div>

          <div class="form-group">
             <label for="">Status Pelaksanaan</label>
             <select name="statuspelaksanaan_idstatuspelaksanaan" class="form-control">
                @foreach ($spelaksanaan as $data)
                    <option value="{{ $data->id }}">{{ $data->statusPelaksanaan }}</option>
                @endforeach
             </select>
          </div>



          <button type="submit" class="btn btn-primary">Simpan Data</button>

        </form>


    </div>
 </div>

</div>
@endsection
