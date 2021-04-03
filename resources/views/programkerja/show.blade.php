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
                  <?php $no= 0; ?>
                    @foreach ($programkerja as $bab)
                       <?php $no++ ;?>
            <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>

                            <tr>
                                <th scope="col">Nama ProgramKerja</th>
                                <td>{{ $bab->NamaProgramKerja }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Tahun ProgramKerja</th>
                                <td>{{ $bab->TahunProgramKerja }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Tipe program</th>
                                <td>{{ $bab->tipeprogram }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal Mulai</th>
                                <td>{{ $bab->tanggalMulai}}</td>
                            </tr>


                            <tr>
                                <th scope="col">Tanggal Berakhir</th>
                                <td>{{ $bab->tanggalBerakhir}}</td>
                            </tr>

                            <tr>
                                <th scope="col">Deskripsi ProgramKerja </th>
                                <td>{{ $bab->DeskripsiProgramKerja }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Status Proker</th>
                                <td>{{ $bab->statusProker}}</td>
                            </tr>

                       </tr>
                    @endforeach
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('programkerja.destroy', $bab->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('programkerja.edit', $bab->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('programkerja.index', $bab->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
