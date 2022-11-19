@extends('layouts.main')

@section('container')
<p>
    <h1>Halaman Edit Profil</h1>
</p>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<form method="post" action="{{ url('/editprofil') }}">
  @csrf
  <input type="hidden" name="id" value="{{ $data->id }}">
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $data->email }}">
    </div>
</div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="password" id="password">
    </div>
  </div>
<div class="mt-2">
    <button type="submit" class="btn btn-primary ft-save"></button>
</div>
</form>
@endsection