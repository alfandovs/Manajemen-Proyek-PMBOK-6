@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/manajer/ganchart">
  <span> &larr; Kembali</span>
</a>
<div class="float-right">
    <a class="btn btn-success" href="/manajer/chart/{{ $id }}">Gantchart</a>
</div>
<p>
    <h1>Form Aktivitas</h1>
</p>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<form method="post" action="{{ url('/manajer/ganchart/store') }}">
  @csrf
  <input type="hidden" name="project_id" value="{{ $id }}">
  <div id="form-ganchart">
    @php
     $count = 1;
     $total = 0;
    @endphp
    @forelse($gancharts AS $g)
      @php
      $total += $g->biaya;
      @endphp
    <div class="form-row mb-2" id="fgrow{{ $g->id }}">
      <div class="col">
        <input type="text" class="form-control" name="kegiatan{{ $g->id }}" placeholder="Kegiatan" value="{{ $g->kegiatan }}">
      </div>
      <div class="col">
        <input type="date" class="form-control" name="start_date{{ $g->id }}" placeholder="start" value="{{ $g->start }}">
      </div>
      <div class="col">
        <input type="date" class="form-control" name="end_date{{ $g->id }}" placeholder="end" value="{{ $g->end }}">
      </div>
      <div class="col">
        <input type="number" class="form-control" name="biaya{{ $g->id }}" placeholder="biaya" value="{{ $g->biaya }}" id="biaya{{ $count++ }}">
      </div>
      <div class="col">
        <span class="btn btn-danger ft-trash" onclick="row_delete({{ $g->id }})"></span>
      </div>
    </div>
      @php
      $count = $g->id;   
      @endphp
    @empty
    <div class="form-row">
      <div class="col">
        <label for="exampleDataList" class="form-label">Kegiatan :</label>
        <input type="text" class="form-control" name="kegiatan1" placeholder="Kegiatan" value="">
      </div>
      <div class="col">
        <label for="exampleDataList" class="form-label">Start Date :</label>
        <input type="date" class="form-control" name="start_date1" placeholder="start" value="">
      </div>
      <div class="col">
        <label for="exampleDataList" class="form-label">End Date :</label>
        <input type="date" class="form-control" name="end_date1" placeholder="end" value="">
      </div>
      <div class="col">
        <label for="exampleDataList" class="form-label">Biaya :</label>
        <input type="number" class="form-control" name="biaya1" placeholder="biaya" value="">
      </div>
      <div class="col">
          {{-- <span class="btn btn-danger ft-trash" onclick="row_delete(1)"></span> --}}
        </div>
      </div>
      @php
      $count = 1;   
      @endphp
      @endforelse
      <input type="hidden" value="{{ $count }}" name="count" id="count">
  </div>
<div class="mt-2">
    <span class="btn btn-success ft-plus" id="fg-add"></span>
    <button type="submit" class="btn btn-primary ft-save"></button>
    <div class="float-right">
      <label for="total" class="form-label">Total Biaya: </label>
      <input type="number" class="form-control" name="total" placeholder="total" value="{{ $total }}">
    </div>
</div>
</form>
@endsection

@section('script')
<script>
  var count = $('#count').val();
  $('#fg-add').click(function(){
    count++;
    var html = `
    <div class="form-row mt-2" id="fgrow${count}">
      <div class="col">
        <input type="text" class="form-control" name="kegiatan${count}" placeholder="Kegiatan">
      </div>
      <div class="col">
        <input type="date" class="form-control" name="start_date${count}" placeholder="start">
      </div>
      <div class="col">
        <input type="date" class="form-control" name="end_date${count}" placeholder="end">
      </div>
      <div class="col">
        <input type="number" class="form-control" name="biaya${count}" placeholder="biaya">
      </div>
      <div class="col">
          <button class="btn btn-danger ft-trash" onclick="row_delete(${count})"></button>
      </div>
    </div>
    `;
    $('#form-ganchart').append(html);
    $('#count').val(count);
  });

  function row_delete(count){
    $('#fgrow'+count).remove();
  }
</script>
@endsection