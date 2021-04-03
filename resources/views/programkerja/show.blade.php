@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Program Kerja')
  @section('page-title','Program Kerja')
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
                                <td>{{ $programkerja->NamaProgramKerja }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Tahun ProgramKerja</th>
                                <td>{{ $programkerja->TahunProgramKerja }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Tipe program</th>
                                <td>{{ $programkerja->tipeprogram }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Mulai</th>
                                <td>{{ $programkerja->tanggalMulai}}</td>
                            </tr>


                            <tr>
                                <th scope="col">Tanggal Berakhir</th>
                                <td>{{ $programkerja->tanggalBerakhir}}</td>
                            </tr>

                            <tr>
                                <th scope="col">Deskripsi ProgramKerja </th>
                                <td>{{ $programkerja->DeskripsiProgramKerja }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Status Proker</th>
                                <td>{{ $programkerja->statusProker}}</td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('programkerja.destroy', $programkerja->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('programkerja.edit', $programkerja->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('programkerja.index', $programkerja->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
