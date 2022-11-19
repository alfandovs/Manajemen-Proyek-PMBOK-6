@extends('layouts.main')

@section('container')
<p>
    <h3> Schedule Plan </h3>
</p>
<form class="float-right">
  <a class="btn btn-primary mb-3" href="/exportscheduleplan">
      <span>Schedule Management Pdf</span> 
  </a>
  <a class="btn btn-primary mb-3" href="/exportproject4">
    <span>Project Dokumen Pdf</span> 
</a>
</form>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name Project</th>
          <th>Start</th>
          <th>End</th>
          <th>Dokumen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach ($project as $projects)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $projects->name }}</td>
          <td>{{ $projects->start }}</td>
          <td>{{ $projects->end }}</td>
          <th>
            <a href="/exportschedule2/{{ $projects->id }}" target="_blank" class="btn btn-info ft-file-minus"> Schedule </a>
          </th>
          <td>
            <form action="" method="post" class="d-inline">
              <a href="{{ url("manajer/ganchart/create/$projects->id") }}" class="btn btn-primary editbtn ft-plus"></a>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection