@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="{{ route('statusprogramkerja.create') }}" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  <div class="card">
    {{-- <div class="card-header">Data Rapat</div> --}}
    <div class="card-head">
      <form action="{{ route('statusprogramkerja.index') }}" method="get">
      <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
      <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
      </form>
    </div>
  </div>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>

          <th scope="col">Status Program Kerja</th>
          <th scope="col">Keterangan </th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($statusprogramkerja as $spk)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
    <td>{{ $spk->statusProker }}</td>
        <td>{{ $spk->keteranganStatus }}</td>

        <td>
            <form action="{{ route('statusprogramkerja.destroy', $spk->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('statusprogramkerja.edit', $spk->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
