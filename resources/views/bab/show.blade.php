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
                                <th scope="col">Nama Bab</th>
                                <td>{{ $babAkreditasi->NamaBab }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Gambaran Umum</th>
                                <td>{{ $babAkreditasi->GambaranUmum }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}


                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <a href="{{ route('bab.index') }}" class="btn btn-danger">Kembali</a>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
