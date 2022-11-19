@extends('layouts.main')

@section('container')
<p>
<center><h3>Data Klien Intive Studio</h3></center>
</p>

<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Addres</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1 ?>
      @foreach ($data as $k)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $k->name }}</td>
          <td>{{ $k->addres }}</td>
          <td>{{ $k->phone }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection