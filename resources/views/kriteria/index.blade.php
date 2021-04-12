@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','SubSubBab')
  @section('page-title','Kriteria')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('kriteria.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered">

                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor Kriteria</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Maksud dan Tujuan</th>

                        <th scope="col">Aksi</th>

                      </tr>
                    </thead>
                <tbody>
                  <?php $no= 0; ?>
                    @foreach ($kriteria as $bab)
                       <?php $no++ ;?>
                        <tr>
                          <td>{{ ($kriteria ->currentpage()-1) * $kriteria ->perpage() + $loop->index + 1 }}</td>
                          <td>{{ $bab->NomerKriteria }}</td>
                          <td>{{ $bab->namaKriteria }}</td>
                          <td>{{ $bab->MaksudDanTujuan }}</td>

                          <td>
                            <form action="{{ route('kriteria.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('kriteria.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                              <a href="{{ route('kriteria.show', $bab->id) }}" class="btn btn-warning">View</a>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                    @foreach ($subbab_dua as $bab)
                       <?php $no++ ;?>
                        <tr>
                          {{-- <td>{{ ($subbab_dua->currentpage()-1) * $subbab_dua ->perpage() + $loop->index + 1 }}</td> --}}
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $bab->NomerKriteria }}</td>
                          <td>{{ $bab->namaKriteria }}</td>
                          <td>{{ $bab->MaksudDanTujuan }}</td>

                          <td>
                            <form action="{{ route('bab_dua.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('bab_dua.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                              <a href="{{ route('bab_dua.show', $bab->id) }}" class="btn btn-warning">View</a>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                    @foreach ($subbab_tiga as $bab)
                       <?php $no++ ;?>
                        <tr>
                          {{-- <td>{{ ($subbab_dua->currentpage()-1) * $subbab_dua ->perpage() + $loop->index + 1 }}</td> --}}
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $bab->NomerKriteria }}</td>
                          <td>{{ $bab->namaKriteria }}</td>
                          <td>{{ $bab->MaksudDanTujuan }}</td>

                          <td>
                            <form action="{{ route('bab_tiga.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('bab_tiga.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                              <a href="{{ route('bab_tiga.show', $bab->id) }}" class="btn btn-warning">View</a>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kriteria->links() }}
      </div>
    </div>
  </div>
</div>




@endsection


