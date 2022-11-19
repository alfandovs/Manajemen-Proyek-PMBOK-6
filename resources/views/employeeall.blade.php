@extends('layouts.main')

@section('container')
<p>
<center><h3>Data Anggota Intive Studio</h3></center>
</p>

<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Skill</th>
          <th>Position</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1 ?>
      @foreach ($data as $e)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $e->name }}</td>
          <td>{{ $e->skill }}</td>
          <td>{{ $e->position }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection