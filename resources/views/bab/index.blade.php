@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/bab/create" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  
  <table class="table">
  
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          
          <th scope="col">Nomor Bab</th>
          <th scope="col">Kode Bab</th>
          <th scope="col">Nama Bab</th>
          
         
        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($bab as $bb)
    <?php $no++ ;?>
    <tr>
    <td>{{ ($bab ->currentpage()-1) * $bab ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $bb->nomorBab }}</td>
        <td>{{ $bb->kodeBab }}</td>
        <td>{{ $bb->namaBab }}</td>
        
        <td>
            <a href="/bab/edit/{{$bb->idBab}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Upload</a>
            <form action="{{url ('bab/' .$bb->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin dihapus?')">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            <!--<a href="" class="badge badge-danger">Delete</a>-->
             
                     
        </td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection