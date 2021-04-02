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
                    @foreach ($dokumen as $bab)
                       <?php $no++ ;?>
            <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>
                            <tr>
                                <th scope="col">#</th>
                                <td>{{ $bab->id }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama Dokumen</th>
                                <td>{{ $bab->namaDokumen }}</td>
                            </tr>

                            <tr>
                                <th scope="col">keterangan</th>
                                <td>{{ $bab->keterangan }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th>File</th>
                                <td>
                                  <a href="{{ Storage::url('surat_dokumen/'. $bab->file) }}">{{ $bab->file }}</a>
                                </td>
                            </tr>

                       </tr>
                    @endforeach
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('dokumen.destroy', $bab->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('dokumen.edit', $bab->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('dokumen.index', $bab->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
