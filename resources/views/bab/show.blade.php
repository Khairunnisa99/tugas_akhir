@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Kriteria')
  @section('page-title','Bab')
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
                                <th scope="col">Nomor Bab </th>
                                <td>{{ $babAkreditasi->NomorBab }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Kode Bab</th>
                                <td>{{ $babAkreditasi->KodeBab }}</td>
                            </tr>

                            <tr>
                                <th scope="col">NamaBab</th>
                                <td>{{ $babAkreditasi->NamaBab }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}


                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('bab.destroy', $babAkreditasi->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('bab.edit', $babAkreditasi->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('bab.index', $babAkreditasi->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
