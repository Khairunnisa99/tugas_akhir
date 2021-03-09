@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Bab')
  @section('page-title','Standar')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('standar.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered">
                
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                        
                      
                      </tr>
                    </thead>
                <tbody>
                  <?php $no= 0; ?>
                    @foreach ($subbab as $bab)
                       <?php $no++ ;?>
                        <tr>
                            <td>{{ ($subbab ->currentpage()-1) * $subbab ->perpage() + $loop->index + 1 }}</td>
                          <td>{{ $bab->SubBabNomor }}</td>
                          <td>{{ $bab->SubBabNama }}</td>
                          <td>{{ $bab->SubBabStandard }}</td>
                          <td>{{ $bab->SubBabDeskripsi }}</td>
                          <td>
                            <form action="{{ route('standar.destroy', $bab->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('standar.edit', $bab->id) }}" class="btn btn-info">Edit</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin menghapus?')">Delete</button>
                            </form>
                          </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>




@endsection