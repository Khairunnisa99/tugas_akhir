@extends('layouts.app')
{{-- @push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush --}}
  @section('title','Tambah Data')
  @section('page-title','Home')
  @section('content')
<div class="container">
 <div class="row">
    <div class="card-title">
       <h3>Tambah Data </h3>
    </div>
    <div class="card">
        <div class="card-body">
        <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Masukan Nama">
         </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan Email">
          </div>
          <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="" class="col-form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="col-form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
             <div class="form-group">
                <label class="font-weight-bold">Role</label>
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ old('name', $role->name) }}" id="check-{{ $role->id }}">
                        <label class="form-check-label" for="check-{{ $role->id }}">
                        {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>
          <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>

        </form>
    </div>
    </div>
 </div>
</div>
@endsection
