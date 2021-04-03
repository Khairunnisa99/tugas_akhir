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
                                <th scope="col">No. Elemen</th>
                                <td>{{ $elemen->NoElemen }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Elemen Penilaian</th>
                                <td>{{ $elemen->ElemenPenilaian }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Materi Telusur</th>
                                <td>{{ $elemen->MateriTelusur }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Dokument Internal</th>
                                <td>{{ $elemen->DokumentInternal }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Dokumen Eksternal</th>
                                <td>{{ $elemen->DokumenEksternal }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Kriteria</th>
                                <td>{{ $elemen->namaKriteria }}</td>
                            </tr>

                            <tr>
                                <th scope="col">File</th>
                                <td>
                                    {{-- @foreach ($bab->dokumen as $item) --}}
                                    <a href="{{ Storage::url('surat_dokumen/'. $elemen->file) }}">{{ $elemen->file }} <br></a>
                                {{-- @endforeach --}}
                                </td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('elemen.destroy', $elemen->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('elemen.edit', $elemen->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('elemen.index', $elemen->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
