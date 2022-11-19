@extends('layouts.main')

@section('container')

<a class="btn btn-primary mb-3" href="/progressall">
    <span> &larr; Kembali</span>
</a>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Gambar</th>
        <th>Progress</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach ($data as $pro)
    <tr>
      <td><?php echo $i++;?></td>
      <td>{{ $pro->date }}</td>
      <td><img src="/assets/picture/{{ $pro->file }}" alt="" width="150"></td>
      <td>{{ $pro->progress }}</td>
      <td>{{ $pro->status }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection