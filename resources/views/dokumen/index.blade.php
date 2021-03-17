@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/dokumen/create" class="btn btn-primary my-3">Tambah Data</a>
  <form action="/search" method="get">

    <input type="search" name="search" class="form-control">
    <span class="input-group-prepend">
        <button type="submit" class="btn btn-success">Search</button>
    </span>                 </form>
  <!-- Default box -->

  <table class="table">

      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>

          <th scope="col">Nama Dokumen</th>
          <th scope="col">Keterangan</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($dokumen as $dok)
    <?php $no++ ;?>
    <tr>
    <td>{{ ($dokumen ->currentpage()-1) * $dokumen ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $dok->namaDokumen }}</td>
        <td>{{ $dok->keterangan }}</td>

        <td>
            <form action="{{ route('dokumen.destroy', $dok->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('dokumen.edit', $dok->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $dokumen->links() }}

@endsection
