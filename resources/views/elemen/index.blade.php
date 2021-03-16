@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','kriteria')
  @section('page-title','elemen')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('elemen.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered">

                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor elemen</th>
                        <th scope="col">Elemen penilaian</th>
                        <th scope="col">Materi Telusur</th>
                        <th scope="col">Dokumen Internal</th>
                        <th scope="col">Dokumen External</th>
                        <th scope="col">Aksi</th>

                      </tr>
                    </thead>
                <tbody>
                  <?php $no= 0; ?>
                    @foreach ($elemen as $bab)
                       <?php $no++ ;?>
                        <tr>
                          <td>{{ ($elemen ->currentpage()-1) * $elemen ->perpage() + $loop->index + 1 }}</td>
                          <td>{{ $bab->NoElemen }}</td>
                          <td>{{ $bab->ElemenPenilaian }}</td>
                          {{-- <td>{{ $bab->TelusurSasaran }}</td> --}}
                          <td>{{ $bab->MateriTelusur }}</td>
                          <td>{{ $bab->DokumentInternal }}</td>
                          <td>{{ $bab->DokumenEksternal }}</td>
                          {{-- <td>{{ $bab->Skor }}</td> --}}
                          <td>
                            <form action="{{ route('elemen.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('elemen.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>




@endsection


