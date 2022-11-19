@extends('layouts.main')

@section('container')
<h3> Dokumen Project </h3>
<a class="btn btn-primary mb-3" href="/manajer/project/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Dokumen</span> 
</a>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
{{-- modal --}}
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" enctype="multipart/form-data" action="{{ url('/manajer/dokumen') }}">
    {{  csrf_field()  }}   
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="project_id">Nama Project</label>
                  <select id="project_id" class="form-control" name="project_id">
                    <option value="">-Pilih Project-</option>
                    @foreach ($project as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                      </select>
                </div>
                     <div class="form-group">
                        <label for="nama">Nama Dokumen</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Project">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Pilih Dokumen</label>
                        <input class="form-control" type="file" id="file" name="dokumen" multiple>
                      </div>                      
                </div>
                    <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
</form>
{{-- <form class="modal fade" id="eddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url("/manajer/project")}}">
  @method('PATCH')
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                  <input type="hidden" id="ed-id" name="id">
                   <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   </button>
               </div>
               <div class="modal-body">
                <div class="form-group">
                  <label for="employe_id">Nama PIC</label>
                  <select id="ed-employe_id" class="form-control" name="employe_id">
                    <option value="">-Pilih PIC-</option>
                    @foreach ($employe as $e)
                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                    @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="client_id">Nama Klien</label>
                    <select id="ed-client_id" class="form-control" name="client_id">
                        <option value="name">-Pilih Klien-</option>
                      @foreach ($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                </div>
                     <div class="form-group">
                        <label for="nama">Nama Project</label>
                        <input type="text" class="form-control" id="ed-name" name="name" placeholder="Nama Project">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date</label>
                        <input type="date" class="form-control" id="ed-start_date" name="start_date" placeholder="Start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date</label>
                        <input type="date" class="form-control" id="ed-end_date" name="end_date" placeholder="End">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Cost</label>
                        <input type="number" class="form-control" id="ed-biaya" name="biaya" placeholder="Cost">
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control" id="ed-tujuan" name="tujuan" placeholder="Tujuan">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="ed-deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                </div>
                   <div class="modal-footer">
                   <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                   <button type="submit" class="btn btn-primary">Ubah</button>
                   </div>
               </div>
           </div>
       </div>
</form> --}}
{{-- modal --}}
@if (session()->has('success'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Nama Project</th>
          <th>Nama Dokumen</th>
          <th>Dokumen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $documents)
        <tr>
          <td>{{ $documents->project}}</td>
          <td>{{ $documents->name }}</td>
          <td>{{ $documents->file }}</td>
          <td>
            <form action="{{ url("manajer/dokumen/$documents->id") }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger ft-trash"></button>
                <a href="/assets/dokumen/{{ $documents->file }}" target="_blank" class="btn btn-info ft-eye"></a>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection