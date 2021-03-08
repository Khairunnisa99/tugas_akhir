@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/babdua/create" class="btn btn-primary my-3">Tambah Data</a>
  <!-- Default box -->
  
  <table class="table">
  
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          
          <th scope="col">Nomor Kriteria</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Maksud dan Tujuan</th>
         
        </tr>
      </thead>
  <tbody>
  <?php $no = 0;?>
    @foreach($babdua as $dua)
    <?php $no++ ;?>
    <tr>
    <td>{{ ($babdua ->currentpage()-1) * $babdua ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $dua->nomorKriteria }}</td>
        <td>{{ $dua->namaKriteria }}</td>
        <td>{{ $dua->maksudTujuan }}</td>
        
        <td>
            <a href="/babdua/edit/{{$dua->idBabdua}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Upload</a>
            <form action="{{url ('babdua/' .$dua->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin dihapus?')">
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