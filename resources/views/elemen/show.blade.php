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
                  <?php $no= 0; ?>
                    @foreach ($elemen as $bab)
                      <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>

                            <tr>
                                <th scope="col">No. Elemen</th>
                                <td>{{ $bab->NoElemen }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Elemen Penilaian</th>
                                <td>{{ $bab->ElemenPenilaian }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Materi Telusur</th>
                                <td>{{ $bab->MateriTelusur }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Dokument Internal</th>
                                <td>{{ $bab->DokumentInternal }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Dokumen Eksternal</th>
                                <td>{{ $bab->DokumenEksternal }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Kriteria</th>
                                <td>{{ $bab->namaKriteria }}</td>
                            </tr>

                            <tr>
                                <th scope="col">File</th>
                                <td>
                                    @foreach ($bab->dokumen as $item)
                                    <a href="{{ Storage::url('surat_dokumen/'. $item->file) }}">{{ $item->file }} <br></a>
                                @endforeach
                                </td>
                            </tr>

                       </tr>
                    @endforeach
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('elemen.destroy', $bab->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('elemen.edit', $bab->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('elemen.index', $bab->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
