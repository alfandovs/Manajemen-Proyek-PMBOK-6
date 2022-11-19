@extends('layouts.main')

@section('container')
<h3> Manage Stakeholder </h3>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate">
      <span>Project Plan Update</span> 
  </a>
  <a class="btn btn-primary mb-3" href="/manajer/work-data">
    <span>Work Information</span> 
</a>
</form>

<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name Project</th>
          <th>Revisi</th>
          <th>Dokumen</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach ($project as $projects)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $projects->name }}</td>
          <td>{{ $projects->saran }}</td>
          <td>
            <form action="{{ url("manajer/project/$projects->id") }}" method="post">
                  <a href="/exportpdf/{{ $projects->id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection