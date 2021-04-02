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
                  <?php $no= 0; ?>
                    @foreach ($rapat as $bab)
                       <?php $no++ ;?>
            <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>
                            <tr>
                                <th scope="col">#</th>
                                <td>{{ $bab->id }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama Rapat</th>
                                <td>{{ $bab->namaRapat }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Waktu Rapat</th>
                                <td>{{ $bab->WaktuRapat }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Keterangan Rapat</th>
                                <td>{{ $bab->KeteranganRapat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Peserta Rapat</th>
                                <td>{{ $bab->PesertaRapat}}</td>
                            </tr>


                            <tr>
                                <th scope="col">Notulen Rapat</th>
                                <td>{{ $bab->NotulenRapat}}</td>
                            </tr>

                            <tr>
                                <th scope="col">Materi Rapat </th>
                                <td>{{ $bab->MateriRapat }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Rekomendasi</th>
                                <td>{{ $bab->Rekomendasi}}</td>
                            </tr>


                            <tr>
                                <th scope="col">TindakLanjut</th>
                                <td>{{ $bab->TindakLanjut}}</td>
                            </tr>

                       </tr>
                    @endforeach
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('rapat.destroy', $bab->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('rapat.edit', $bab->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('rapat.index', $bab->id) }}" class="btn btn-warning">Calcel</a>
              <a href="{{ url('/print_all') }}" class="btn btn-primary mt-4" target="_blank">Export all to PDF</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
