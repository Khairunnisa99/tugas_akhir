@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Klinik')
  @section('page-title','Klinik')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              {{-- <a href="{{ route('standar.create') }}" class="btn btn-primary my-3">Tambah Data</a> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <tbody>
                  <?php $no= 0; ?>
                    @foreach ($klinik as $bab)
                       <?php $no++ ;?>
            <table class="table table-bordered">
                       <thead class="thead-dark">
                        <tr>
                            <tr>
                                <th scope="col">#</th>
                                <td>{{ $bab->id }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Nama Klinik</th>
                                <td>{{ $bab->namaKlinik }}</td>
                            </tr>

                            <tr>
                                <th scope="col">Alamat Klinik</th>
                                <td>{{ $bab->alamatKlinik }}</td>
                            </tr>
                            {{-- <td>{{ ($standar ->currentpage()-1) * $standar ->perpage() + $loop->index + 1 }}</td> --}}
                            <tr>
                                <th scope="col">Web Klinik</th>
                                <td>{{ $bab->webKlinik }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Telpon Klinik</th>
                                <td>{{ $bab->telponKlinik }}</td>
                            </tr>


                            <tr>
                                <th scope="col">Logo</th>
                                <td><img src="{{Storage::url('klinik/' . $bab->logo)}}" alt="" width="100px"></td>

                            </tr>

                       </tr>
                    @endforeach
                </tbody>

            </table>
          <div class="box-body">
            <form action="{{ route('klinik.destroy', $bab->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('klinik.edit', $bab->id) }}" class="btn btn-info">Edit</a>
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
              <a href="{{ route('klinik.index', $bab->id) }}" class="btn btn-warning">Calcel</a>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>




@endsection
