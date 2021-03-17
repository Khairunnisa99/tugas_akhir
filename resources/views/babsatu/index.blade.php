@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')

  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('bab_satu.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

  <!-- Default box -->

  <table class="table table-bordered">

      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Nomor Kriteria</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Maksud dan Tujuan</th>
          <th scope="col">Aksi</th>

        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
  @foreach($babs as $btu)
  @php
        $no++
  @endphp
    <tr>
    <td>{{ ($babs ->currentpage()-1) * $babs ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $btu->NomerKriteria }}</td>
        <td>{{ $btu->namaKriteria }}</td>
        <td>{{ $btu->MaksudDanTujuan }}</td>

        <td>
          <form action="{{ route('bab_satu.destroy', $btu->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{ route('bab_satu.edit', $btu->id) }}" class="btn btn-info">Edit</a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
{{$babs->links()}}
      </div>
    </div>
  </div>
</div>


@endsection
