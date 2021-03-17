@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/periodeprogramkerja/create" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>

          <th scope="col">Nama Program Kerja</th>
          <th scope="col">Tahun Program Kerja</th>
          <th scope="col">Tanggal Mulai</th>
          <th scope="col">Tanggal Berakhir</th>
          <th scope="col">Deskripsi Periode Program Kerja</th>
          <th scope="col">lock</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($periodeprogramkerja as $period)
    <?php $no++ ;?>
    <tr>
    <td>{{ $no }}</td>
        <td>{{ $period->NamaPeriodeProgramKerja }}</td>
        <td>{{ $period->TahunProgramKerja }}</td>
        <td>{{ $period->tanggalMulai }}</td>
        <td>{{ $period->tanggalBerakhir }}</td>
        <td>{{ $period->DeskripsiPeriodeProgramKerja }}</td>
        <td>{{ $period->lock }}</td>

        <td>
            <form action="{{ route('periode.destroy', $period->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('programkerja.edit', $pkj->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
