@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/dokumen/create" class="btn btn-primary my-3">Tambah Data</a>
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
        <td>{{ $kli->logo }}</td>
        
        <td>
            <a href="/klinik/edit/{{$kli->idKlinik}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection