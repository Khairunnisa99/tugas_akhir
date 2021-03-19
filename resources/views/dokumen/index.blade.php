@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="{{ route('dokumen.create') }}" class="btn btn-primary my-3">Tambah Data</a>
 <div class="card">
      {{-- <div class="card-header">Data Rapat</div> --}}
      <div class="card-head">
        <form action="{{ route('dokumen.index') }}" method="get">
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
  {{ $dokumen->links() }}
</table>


@endsection
