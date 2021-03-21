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
            <a href="{{ route('statuspelaksanaan.create') }}" class="btn btn-primary my-3">Tambah Data</a>
        </div>
            <div class="card">
              {{-- <div class="card-header">Data Rapat</div> --}}
              <div class="card-head">
                <form action="{{ route('statuspelaksanaan.index') }}" method="get">
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

                    <th scope="col">Status Pelaksanaan</th>
                    <th scope="col">Keterangan Status</th>
                    <th scope="col">Aksi</th>

                  </tr>
                </thead>
            <tbody>
            <?php $no = 0;?>
              @foreach($statuspelaksanaan as $spn)
              <?php $no++ ;?>
              <tr>
              <td>{{ $no }}</td>
              <td>{{ $spn->statusPelaksanaan }}</td>
                  <td>{{ $spn->keteranganStatus }}</td>

                  <td>
                      <form action="{{ route('statuspelaksanaan.destroy', $spn->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('statuspelaksanaan.edit', $spn->id) }}" class="btn btn-info">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
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
