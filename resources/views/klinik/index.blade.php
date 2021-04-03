@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Klinik')
  @section('page-title','Klinik')
  @section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
          <a href="{{route('klinik.create')}}" class="btn btn-primary my-3">Tambah Data</a>
      </div>
        <form action="{{ route('klinik.index') }}" method="get">
        <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
        <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
        </form>
  <!-- Default box -->
   <div class="box-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"></th>

                    <th scope="col">Nama Klinik</th>
                    <th scope="col">Alamat Klinik</th>
                    <th scope="col">Web Klinik</th>
                    <th scope="col">Telpon Klinik</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Aksi</th>

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
                        <a href="{{ route('klinik.show', $kli->id) }}" class="btn btn-warning">View</a>
                      </form>
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
           {{ $klinik->links() }}
        </div>
    </div>
  </div>
</div>


@endsection
