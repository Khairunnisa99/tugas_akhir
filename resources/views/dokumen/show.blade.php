@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dokumen')
  @section('page-title','Dokumen')
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
                                <th scope="col">Nama Dokumen</th>
                                <td>{{ $dokumen->namaDokumen }}</td>
                            </tr>

                            <tr>
                                <th scope="col">keterangan</th>
                                <td>{{ $dokumen->keterangan }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th>File</th>
                                <td>
                                  <a href="{{ Storage::url('surat_dokumen/'. $dokumen->file) }}">{{ $dokumen->file }}</a>
                                </td>
                            </tr>

                       </tr>
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('dokumen.index', $dokumen->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
