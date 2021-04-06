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
        <h1 class="mt-10">Tambah Data </h1>

        <form method="post" action="{{ route('pelaksanaanprogram.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Program Kerja</label>
            <select name="programkerja_idprogramkerja" class="form-control">
               @foreach ($programkerja as $datas)
                   <option value="{{ $datas->id }}">{{ $datas->NamaProgramKerja }}</option>
               @endforeach
            </select>
         </div>
          <div class="form-group">
             <label for="">Tipe Pelaksanaan</label>
             <select name="typepelaksanaan_idtypepelaksanaan" class="form-control">
                @foreach ($tipepelak as $datas)
                    <option value="{{ $datas->id }}">{{ $datas->namaTypePelaksanaan }}</option>
                @endforeach
             </select>
          </div>

          <div class="form-group">
            <label for="">Nama Pelaksanaan</label>
            <input type="text"  name="NamaPelaksanaan" class="form-control" placeholder="Masukan Nama Pelaksanaan">
         </div>
          <div class="form-group">
             <label for="">Tanggal Mulai</label>
             <input type="date" name="TanggalMulai" id="" class="form-control">
          </div>
          <div class="form-group">
             <label for="">Tanggal Berakhir</label>
             <input type="date" name="TanggalBerakhir" id="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Keterangan Pelaksanaan</label>
            <textarea name="KeteranganPelaksanaan" id="" cols="30" rows="5" class="form-control"></textarea>
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
          <a href="{{ route('pelaksanaanprogram.index') }}" class="btn btn-danger">Kembali</a>

        </form>


    </div>
 </div>

</div>
@endsection
