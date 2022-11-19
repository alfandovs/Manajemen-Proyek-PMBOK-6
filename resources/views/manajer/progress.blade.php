@extends('layouts.main')

@section('container')
<h3> Progress Project </h3>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate3">
      <span>Project Plan Update</span> 
  </a>
</form>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name Project</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach ($project as $projects)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $projects->name }}</td>
          <td>
            <form action="" method="post" class="d-inline">
              <a href="{{ url("manajer/progress/create/$projects->id") }}" class="btn btn-success ft-plus"></a>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection