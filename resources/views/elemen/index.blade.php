@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Elemen')
  @section('page-title','Elemen')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('elemen.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>

            <div class="card">
                {{-- <div class="card-header">Data Rapat</div> --}}
                <div class="card-head">
                  <form action="{{ route('elemen.index') }}" method="get">
                  <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
                  <input class="form-control" type="text" name="q" placeholder="Masukkan no.elemen" style="width: 200px; float:right">
                  </form>
                </div>
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
                        <th>Dokumen</th>
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
                            @foreach ($bab->dokumen as $item)
                                <a href="{{ Storage::url('surat_dokumen/'. $item->file) }}">{{ $item->file }} <br></a>
                            @endforeach
                          </td>
                          <td>
                            <form action="{{ route('elemen.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('elemen.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                              <a href="{{ route('elemen.show', $bab->id) }}" class="btn btn-warning">View</a>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
             {{ $elemen->links() }}
      </div>
    </div>
  </div>
</div>




@endsection


