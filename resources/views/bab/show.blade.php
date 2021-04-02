@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }

    </style>

<body>
<div class="container">
  <h2>Daftar Rapat</h2>


  <table class="table">
    <thead>

    <?php $table= $babAkreditasi;?>

      <tr>
        <th>Nomor Bab</th>
        <td >{{ $table->NomorBab }}</td>

      </tr>
      <tr>
        <th>Kode Bab</th>
        <td >{{ $table->KodeBab }}</td>

      </tr>
      <tr>
        <th>Nama Bab</th>
        <td>{{ $table->NamaBab }}</td>

      </tr>


    </thead>
  </table>
  <td>
    <form action="{{ route('bab.destroy', $table->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <a href="{{ route('bab.edit', $table->id) }}" class="btn btn-info">Edit</a>
      <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
      <a href="{{ route('bab.index', $table->id) }}" class="btn btn-warning">Cancel</a>
    </form>
  </td>
</div>


</body>

@endsection
