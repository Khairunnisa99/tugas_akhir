@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')

     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{ route('pelaksanaanprogram.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>

            <div class="box-body">
  <!-- Default box -->
                  <table class="table table-bordered">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>

                          <th scope="col">Program Kerja</th>
                          <th scope="col">Tipe Pelaksanaan</th>
                          <th scope="col">Nama Pelaksanaan</th>
                          <th scope="col">Tanggal Mulai</th>
                          <th scope="col">Tanggal Berakhir</th>
                          <th scope="col">Keterangan Pelaksanaan</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>

                        </tr>
                      </thead>
                  <tbody>
                  <?php $no = 0;?>
                    @foreach($pelaksanaanprogram as $pkj)
                    <?php $no++ ;?>
                    <tr>
                    <td>{{ $no }}</td>
                        <td>{{ $pkj->NamaProgramKerja }}</td>
                        <td>{{ $pkj->namaTypePelaksanaan }}</td>
                        <td>{{ $pkj->NamaPelaksanaan }}</td>
                        <td>{{ $pkj->TanggalMulai }}</td>
                        <td>{{ $pkj->TanggalBerakhir }}</td>
                        <td>{{ $pkj->KeteranganPelaksanaan }}</td>
                        <td>{{ $pkj->statusPelaksanaan }}</td>

                        <td>
                            <form action="{{ route('pelaksanaanprogram.destroy', $pkj->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('pelaksanaanprogram.edit', $pkj->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin mengahapus?')">Delete</button>
                              <a href="{{ route('pelaksanaanprogram.show', $pkj->id) }}" class="btn btn-warning">View</a>
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
