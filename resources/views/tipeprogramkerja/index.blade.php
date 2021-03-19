@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="{{ route('tipeprogramkerja.create') }}" class="btn btn-primary my-3">Tambah Data</a>
  <div class="card">
    {{-- <div class="card-header">Data Rapat</div> --}}
    <div class="card-head">
      <form action="{{ route('tipeprogramkerja.index') }}" method="get">
      <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
      <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
      </form>
    </div>
  </div>
  <!-- Default box -->
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>

          <th scope="col">Tipe Program</th>
          <th scope="col">Keterangan</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($tipeprogramkerja as $tp)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
        <td>{{ $tp->tipeprogram }}</td>
        <td>{{ $tp->keterangantipe }}</td>

        <td>
            <form action="{{ route('tipeprogramkerja.destroy', $tp->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('tipeprogramkerja.edit', $tp->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
