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
       <h3>Edit Data </h3>
    </div>
    <div class="card">
        <div class="card-body">
        <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}" placeholder="Masukan Nama">
         </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Masukan Email">
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
                <label class="font-weight-bold">Role </label>
                <select name="roles" class="form-control"> 
                @foreach ($roles as $role)
                    <option value="{{ old('name', $role->name) }}" selected>{{ $role->name }}</option>
                @endforeach
                </select>
            </div>

          <button type="submit" class="btn btn-primary">Simpan Data</button>
                
        </form>
    </div> 
    </div>
 </div>
</div>
@endsection