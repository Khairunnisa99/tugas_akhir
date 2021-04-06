@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Klinik')
  @section('page-title','Klinik')
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
                                <th scope="col">Nama Klinik</th>
                                <td>{{ $klinik->namaKlinik }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Alamat Klinik</th>
                                <td>{{ $klinik->alamatKlinik }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Web Klinik</th>
                                <td>{{ $klinik->webKlinik }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Telpon Klinik</th>
                                <td>{{ $klinik->telponKlinik }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Logo</th>
                                <td><img src="{{Storage::url('klinik/' . $klinik->logo)}}" alt="" width="100px"></td>

                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <a href="{{ route('klinik.index') }}" class="btn btn-danger">Kembali</a>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
