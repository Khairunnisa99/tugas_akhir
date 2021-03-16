@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="{{route('klinik.create')}}" class="btn btn-primary my-3">Tambah Data</a>
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

          <th scope="col">Nama Klinik</th>
          <th scope="col">Alamat Klinik</th>
          <th scope="col">Web Klinik</th>
          <th scope="col">Telpon Klinik</th>
          <th scope="col">Logo</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($klinik as $kli)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
        <td>{{ $kli->namaKlinik }}</td>
        <td>{{ $kli->alamatKlinik }}</td>
        <td>{{ $kli->webKlinik }}</td>
        <td>{{ $kli->telponKlinik }}</td>
        <td>
            <img src="{{Storage::url('klinik/' . $kli->logo)}}" alt="" width="100px">
        </td>

        <td>
            <form action="{{ route('klinik.destroy', $kli->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('klinik.edit', $kli->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
