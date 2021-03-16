@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/tipeprogramkerja/create" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>

          <th scope="col">tipeProgram</th>
          <th scope="col">keterangantipe</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($tipeprogramkerja as $tp)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
        <td>{{ $tp->tipeProgram }}</td>
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
