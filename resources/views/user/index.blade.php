@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content')

<div class="row">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('user.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
              <div class="card">
                {{-- <div class="card-header">Data Rapat</div> --}}
                <div class="card-head">
                  <form action="{{ route('user.index') }}" method="get">
                  <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
                  <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
                  </form>
                </div>
              </div>

              <div class="box-body">
              <!-- Default box -->
              <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col"></th>

                      <th scope="col">Nama</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Aksi</th>

                    </tr>
                  </thead>
               <tbody>
              <?php $no = 0;?>
                @foreach($users as $user)
                <?php $no++ ;?>
                <tr>
                <td>{{ $no }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @foreach ($user->getRoleNames() as $role)
                          <button class="btn btn-success btn-sm btn-rounded">{{ $role }}</button>
                      @endforeach
                    </td>

                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">Edit</a>
                          <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
                        </form>
                      </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $users->links() }}
          </div>
    </div>
</div>
</div>
@endsection
