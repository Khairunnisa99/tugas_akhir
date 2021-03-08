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
          
          <th scope="col">Nama Dokumen</th>
          <th scope="col">Keterangan</th>
         
        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($dokumen as $dok)
    <?php $no++ ;?>
    <tr>
    <td>{{ ($dokumen ->currentpage()-1) * $dokumen ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $dok->namaDokumen }}</td>
        <td>{{ $dok->keterangan }}</td>
        
        <td>
            <a href="/dokumen/edit/{{$dok->idDokumen}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Upload</a>
            <form action="{{url ('dokumen/' .$dok->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin dihapus?')">
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

{{ $dokumen->links() }}

@endsection