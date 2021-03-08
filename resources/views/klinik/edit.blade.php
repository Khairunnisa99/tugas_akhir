@extends('layouts.app')
@push('customcss')
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}"></script>
@endpush
  @section('title','Dahboard')
  @section('page-title','Home')
  @section('content') 
    <div class="container mt-4"> 
    <div class="row"> <div class="col-8"> 
    <h1 class="mt-3">Form Ubah Data Dokumen</h1> 
 
<form method="post" action="{{route('klinik.update', $klinik)}}"> 
    @csrf 
    @method('patch')
    <div class="form-group">     
        <label for="namaKlinik">Nama Klinik</label>     
        <input type="text" class="form-control @error('namaKlinik') is-invalid @enderror" id="namaKlinik" placeholder="namaKlinik" name="namaKlinik" value="{{ $klinik->namaKlinik }}">     
        
            @error('namaKlinik')         
                <div class="invalid-feedback">
                    {{ $message }}
                </div>     
                    @enderror   
    </div>   
        <div class="form-group">     
            <label for="keterangan">Alamat Klinik</label>     
            <input type="text" class="form-control @error('alamatKlinik') is-invalid @enderror" id="alamatKlinik" placeholder="alamatKlinik" name="alamatKlinik" value="{{ $klinik->alamatKlinik }}">     
                @error('alamatKlinik')         
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>    
                        @enderror   
        </div>   
            
                   <button type="submit" class="btn btn-primary">Ubah Data</button> 
</form> 
 
</div> 
</div> 
</div> 
@endsection 
 