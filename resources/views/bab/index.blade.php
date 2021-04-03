@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Bab')
  @section('page-title','BAB')
  @section('content')
  <!-- Default box -->
   <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('bab.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered">

                    <thead class="thead-dark">
                      <tr>
                        <th scope="col"># </th>
                        <th scope="col">Nomor Bab</th>
                        <th scope="col">Kode Bab</th>
                        <th scope="col">Nama Bab</th>
                        <th scope="col">Aksi</th>


                      </tr>
                    </thead>
                <tbody>
                <?php $no = 0;?>
                  @foreach($babAkreditasi as $bb)
                  <?php $no++ ;?>
                        <tr>
                            <td>{{ ($babAkreditasi ->currentpage()-1) * $babAkreditasi ->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $bb->NomorBab }}</td>
                                <td>{{ $bb->KodeBab }}</td>
                                <td>{{ $bb->NamaBab }}</td>

                                <td>
                                  <form action="{{ route('bab.destroy', $bb->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('bab.edit', $bb->id) }}" class="btn btn-info">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
                                    <a href="{{ route('bab.show', $bb->id) }}" class="btn btn-warning">View</a>
                                  </form>
                                </td>
                          </tr>
              @endforeach
            </tbody>
          </table>
          {{ $babAkreditasi->links() }}
      </div>
    </div>
  </div>
</div>




@endsection
