@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Status Programkerja')
  @section('page-title','Status Programkerja')
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
                                <th scope="col">Status Proker </th>
                                <td>{{ $statusprogramkerja->statusProker }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Keterangan</th>
                                <td>{{ $statusprogramkerja->keteranganStatus}}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}


                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('statusprogramkerja.destroy', $statusprogramkerja->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('statusprogramkerja.edit', $statusprogramkerja->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('statusprogramkerja.index', $statusprogramkerja->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
