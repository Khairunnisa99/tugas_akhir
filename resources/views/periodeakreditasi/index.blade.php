@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Periode Akreditasi')
  @section('page-title','Periode Akreditasi')
  @section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ route('periodeakreditasi.create') }}" class="btn btn-primary my-3">Tambah Data</a>
      </div>

    <div class="card">
      <div class="card-head">
        <form action="{{ route('periodeakreditasi.index') }}" method="get">
        <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
        <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
        </form>
      </div>
    </div>

    <div class="box-body">
  <!-- Default box -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>

                    <th scope="col">Nama Periode Akreditasi</th>
                    <th scope="col">Tahun Program Akreditasi</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Berakhir</th>
                    <th scope="col">Deskripsi Periode Akreditasi</th>
                    <th Scope="col">Aksi</th>


                  </tr>
                </thead>
            <tbody>
            <?php $no = 0;?>
              @foreach($periodeakreditasi as $pr)
              <?php $no++ ;?>
              <tr>
              <td>{{ $no }}</td>
              <td>{{ $pr->namaPeriodeAkreditasi }}</td>
                  <td>{{ $pr->tahunProgramAkreditasi }}</td>
                  <td>{{ $pr->TanggalMulai }}</td>
                  <td>{{ $pr->TanggalBerakhir }}</td>
                  <td>{{ $pr->deskripsiPeriodeAkreditasi }}</td>

                  <td>
                      <form action="{{ route('periodeakreditasi.destroy', $pr->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('periodeakreditasi.edit', $pr->id) }}" class="btn btn-info">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
                        <a href="{{ route('periodeakreditasi.show', $pr->id) }}" class="btn btn-warning">View</a>
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
