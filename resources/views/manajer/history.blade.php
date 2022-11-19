@extends('layouts.main')

@section('container')
<h1>Project Cost History</h1>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Name Project</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Cost Sebelum</th>
          <th>Tanggal Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $pro)
        <tr>
          <td>{{ $pro->name }}</td>
          <td>{{ $pro->start }}</td>
          <td>{{ $pro->end }}</td>
          <td>{{ $pro->biaya }}</td>
          <td>{{ $pro->tgl_ubah }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection