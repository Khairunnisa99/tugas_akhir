@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Pelaksanaan ProgramKerja')
  @section('page-title','Pelaksanaan ProgramKerja')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              {{-- <a href="{{ route('standar.create') }}" class="btn btn-primary my-3">Tambah Data</a> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <tbody>
            <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>

                            <tr>
                                <th scope="col">Nama ProgramKerja</th>
                                <td>{{ $pelaksanaanprogram->NamaProgramKerja }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama TypePelaksanaan</th>
                                <td>{{ $pelaksanaanprogram->namaTypePelaksanaan }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Nama Pelaksanaan</th>
                                <td>{{ $pelaksanaanprogram->NamaPelaksanaan }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Mulai</th>
                                <td>{{ $pelaksanaanprogram->TanggalMulai}}</td>
                            </tr>


                            <tr>
                                <th scope="col">Tanggal Berakhir</th>
                                <td>{{ $pelaksanaanprogram->TanggalBerakhir}}</td>
                            </tr>

                            <tr>
                                <th scope="col">Keterangan Pelaksanaan </th>
                                <td>{{ $pelaksanaanprogram->KeteranganPelaksanaan }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Status Pelaksanaan</th>
                                <td>{{ $pelaksanaanprogram->statusPelaksanaan}}</td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('pelaksanaanprogram.destroy', $pelaksanaanprogram->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('pelaksanaanprogram.edit', $pelaksanaanprogram->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('pelaksanaanprogram.index', $pelaksanaanprogram->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
