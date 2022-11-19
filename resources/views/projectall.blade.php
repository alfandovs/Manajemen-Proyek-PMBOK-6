@extends('layouts.main')

@section('container')
<p>
  <center><h3>Data Project Intive Studio</h3></center>
</p>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>PIC</th>
          <th>Project</th>
          <th>Start</th>
          <th>End</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach($data as $p)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $p->employe->name }}</td>
          <td>{{ $p->name }}</td>
          <td>{{ $p->start }}</td>
          <td>{{ $p->end }}</td>
          </tr>
        @endforeach
    </tbody>
    </table>
  </div>
@endsection