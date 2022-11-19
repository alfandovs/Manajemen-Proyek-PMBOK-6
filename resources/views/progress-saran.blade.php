@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/progressall">
    <span> &larr; Kembali</span>
  </a>
<h1>Form Saran</h1>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<form method="post" action="{{ url('/progress/update') }}">
@csrf
  <input type="hidden" name="id" value="{{ $id }}">
<div id="form-ganchart">
    <div class="mb-5 col-10">
        <textarea class="form-control" name="saran" id="saran" rows="5">{{ $projects->saran }}</textarea>
    </div>
</div>
    <div class="mb-5">
        <button type="submit" class="btn btn-primary ft-save"> Simpan</button>
    </div>
</form>
@endsection