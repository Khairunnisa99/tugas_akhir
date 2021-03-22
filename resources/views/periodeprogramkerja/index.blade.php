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
                <a href="{{ route('periodeprogramkerja.create') }}" class="btn btn-primary my-3">Tambah Data</a>
            </div>
                <div class="card">
                      {{-- <div class="card-header">Data Rapat</div> --}}
                      <div class="card-head">
                        <form action="{{ route('periodeprogramkerja.index') }}" method="get">
                        <button type="submit" class="btn btn-primary btn-sm text-center" style="float: right;">CARI</button>
                        <input class="form-control" type="text" name="q" placeholder="Search.." style="width: 200px; float:right">
                        </form>
                      </div>
                    </div>

                      <!-- Default box -->
                  <div class="box-body">
                      <table class="table table-bordered">

                          <thead class="thead-dark">
                            <tr>
                              <th scope="col"></th>

                              <th scope="col">Periode Program Kerja</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col">Aksi</th>

                            </tr>
                          </thead>
                      <tbody>
                      <?php $no = 0;?>
                        @foreach($periodeprogramkerja as $pre)
                        <?php $no++ ;?>
                        <tr>
                        <td>{{ ($periodeprogramkerja ->currentpage()-1) * $periodeprogramkerja ->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $pre->TahunProgramKerja }}</td>
                            <td>{{ $pre->DeskripsiPeriodeProgramKerja }}</td>

                            <td>
                                <form action="{{ route('periodeprogramkerja.destroy', $pre->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <a href="{{ route('periodeprogramkerja.edit', $pre->id) }}" class="btn btn-info">Edit</a>
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('APakah Anda Yakin ingin mengahapus?')">Delete</button>
                                </form>
                              </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $periodeprogramkerja->links() }}

        </div>
      </div>
      </div>
  </div>
@endsection
