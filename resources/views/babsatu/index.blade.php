@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')
  <a href="/babsatu/create" class="btn btn-primary my-3">Tambah Data</a>
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
    @foreach($babsatu as $btu)
    <?php $no++ ;?>
    <tr>
    <td>{{ ($babsatu ->currentpage()-1) * $babsatu ->perpage() + $loop->index + 1 }}</td>
        <td>{{ $btu->nomorKriteria }}</td>
        <td>{{ $btu->namaKriteria }}</td>
        <td>{{ $btu->maksudTujuan }}</td>
        
        <td>
            <a href="/babsatu/edit/{{$btu->idBabsatu}}" class="badge badge-success">Edit</a>
            <a href="" class="badge badge-danger">Upload</a>
            <form action="{{url ('babsatu/' .$btu->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin dihapus?')">
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