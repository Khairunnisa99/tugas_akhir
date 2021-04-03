@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Standar')
  @section('page-title','Standar')
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
                                <th scope="col">Nomor</th>
                                <td>{{ $standar->SubBabNomor }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama</th>
                                <td>{{ $standar->SubBabNama }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Standar</th>
                                <td>{{ $standar->SubBabStandard }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Deskripsi</th>
                                <td>{{ $standar->SubBabDeskripsi }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Bab</th>
                                <td>{{ $standar->NamaBab }}</td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('standar.destroy', $standar->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('standar.edit', $standar->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('standar.index', $standar->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
