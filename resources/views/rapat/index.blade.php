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
    
          <th scope="col">Nama Rapat</th>
          <th scope="col">Waktu Rapat</th>
          <th scope="col">Agenda Rapat</th>
          <th scope="col">Peserta Rapat</th>
          <th scope="col">Notulen Rapat</th>
          <th scope="col">Materi Rapat</th>
          <th scope="col">Rekomendasi</th>
          <th scope="col">Tindak Lanjut</th>

         
        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($rapat as $rpt)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
    <td>{{ $rpt->namaRapat }}</td>
        <td>{{ $rpt->waktuRapat }}</td>
        <td>{{ $rpt->agendaRapat }}</td>
        <td>{{ $rpt->pesertaRapat }}</td>
        <td>{{ $rpt->notulenRapat }}</td>
        <td>{{ $rpt->materiRapat }}</td>
        <td>{{ $rpt->rekomendasi }}</td>
        <td>{{ $rpt->tindakLanjut }}</td>
        
        <td>
            <a href="" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection