@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Kriteria')
  @section('page-title','Kriteria')
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
                                <th scope="col">Nomor Kriteria</th>
                                <td>{{ $kriteria->NomerKriteria }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama</th>
                                <td>{{ $kriteria->SubBabNama }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Nama Kriteria</th>
                                <td>{{ $kriteria->namaKriteria }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Maksud Dan Tujuan</th>
                                <td>{{ $kriteria->MaksudDanTujuan }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Standar</th>
                                <td>{{ $kriteria->SubBabNama }}</td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('kriteria.index', $kriteria->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection