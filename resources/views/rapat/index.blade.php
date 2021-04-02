@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Rapat')
  @section('page-title','Rapat')
  @section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ route('rapat.create') }}" class="btn btn-primary my-3">Tambah Data</a>
      </div>

    <div class="card">
      <div class="card-head">
        <form action="{{ route('rapat.index') }}" method="get">
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

                    <th scope="col">Nama Rapat</th>
                    <th scope="col">Waktu Rapat</th>
                    <th scope="col">Agenda Rapat</th>
                    <th scope="col">Peserta Rapat</th>
                    <th scope="col">Notulen Rapat</th>
                    <th scope="col">Materi Rapat</th>
                    <th scope="col">Rekomendasi</th>
                    <th scope="col">Tindak Lanjut</th>
                    <th scope="col">Aksi</th>


                  </tr>
                </thead>
            <tbody>
            <?php $no = 0;?>
              @foreach($rapat as $rpt)
              <?php $no++ ;?>
              <tr>
              <td>{{ $no }}</td>
              <td>{{ $rpt->namaRapat }}</td>
                  <td>{{ $rpt->WaktuRapat }}</td>
                  <td>{{ $rpt->KeteranganRapat }}</td>
                  <td>{{ $rpt->PesertaRapat }}</td>
                  <td>{{ $rpt->NotulenRapat }}</td>
                  <td>{{ $rpt->MateriRapat }}</td>
                  <td>{{ $rpt->Rekomendasi }}</td>
                  <td>{{ $rpt->TindakLanjut }}</td>

                  <td>
                      <form action="{{ route('rapat.destroy', $rpt->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('rapat.edit', $rpt->id) }}" class="btn btn-info">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
                        <a href="{{ route('rapat.show', $rpt->id) }}" class="btn btn-warning">View</a>
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
