@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','rapat')
  @section('page-title','Rapat')
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
                                <th scope="col">Nama Rapat</th>
                                <td>{{ $rapat->namaRapat }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Waktu Rapat</th>
                                <td>{{ $rapat->WaktuRapat }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Keterangan Rapat</th>
                                <td>{{ $rapat->KeteranganRapat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Peserta Rapat</th>
                                <td>{{ $rapat->PesertaRapat}}</td>
                            </tr>


                            <tr>
                                <th scope="col">Notulen Rapat</th>
                                <td>{{ $rapat->NotulenRapat}}</td>
                            </tr>

                            <tr>
                                <th scope="col">Materi Rapat </th>
                                <td>{{ $rapat->MateriRapat }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Rekomendasi</th>
                                <td>{{ $rapat->Rekomendasi}}</td>
                            </tr>


                            <tr>
                                <th scope="col">TindakLanjut</th>
                                <td>{{ $rapat->TindakLanjut}}</td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('rapat.destroy', $rapat->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('rapat.edit', $rapat->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('rapat.index', $rapat->id) }}" class="btn btn-warning">Calcel</a>
              <a href="{{ url('/print_all') }}" class="btn btn-primary mt-4" target="_blank">Export all to PDF</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
