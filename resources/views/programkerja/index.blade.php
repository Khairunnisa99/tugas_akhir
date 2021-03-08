@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/programkerja/create" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
    
          <th scope="col">Nama Program Kerja</th>
          <th scope="col">Periode</th>
          <th scope="col">Tipe Program</th>
          <th scope="col">Tanggal Mulai</th>
          <th scope="col">Tanggal Berakhir</th>
          <th scope="col">Deskripsi Program Kerja</th>
          <th scope="col">Status</th>
         
        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($programkerja as $pkj)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
        <td>{{ $pkj->namaprogramKerja }}</td>
        <td>{{ $pkj->periode }}</td>
        <td>{{ $pkj->tipeProgram }}</td>
        <td>{{ $pkj->tanggalMulai }}</td>
        <td>{{ $pkj->tanggalBerakhir }}</td>
        <td>{{ $pkj->deskripsiprogramKerja }}</td>
        <td>{{ $pkj->status }}</td>
        
        <td>
            <a href="/programkerja/edit/{{$pkj->idProgramkerja}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection