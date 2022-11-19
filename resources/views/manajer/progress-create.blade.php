@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/manajer/progress">
  <span> &larr; Kembali</span>
</a>
<div class="float-right">
<a class="btn btn-success" href="{{ url("manajer/progresshistory/$id") }}">Lihat Progress</a>
</div>
<P>
  <h3> Form Progress Project </h3>
</P>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<form method="post" action="{{ url('/manajer/progress/store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="project_id" value="{{ $id }}">
    <input type="hidden" name="id" value="">
    <div id="form-progress">
      <div class="form-row mb-2">
        <div class="mb-6 col-10">
        <input type="date" class="form-control" id="progress_date" name="progress_date" value="">
        </div>
    </div>
    <div class="form-row mb-2">
      <label for="formFileMultiple" class="mb-6 col-10">Tambah Gambar</label>
      <input class="mb-6 col-10" type="file" id="file" name="picture" multiple>
    </div> 
    <div class="form-row mb-2">
        <div class="mb-6 col-10">
            <textarea class="form-control" id="progress" name="progress" rows="10"></textarea>
        </div>
    </div>
    <input type="radio" class="btn-check" name="status" id="run" autocomplete="off" value="run">
    <label for="run" class="badge badge-warning" >Run</label>
    <input type="radio" class="btn-check ml-2" name="status" id="close" autocomplete="off" value="close" >
    <label for="close" class="badge badge-success">Close</label>
    </div>
    <div class="mt-2">
      <button type="submit" class="btn btn-primary ft-save"></button>
    </div>
  </form>

@endsection