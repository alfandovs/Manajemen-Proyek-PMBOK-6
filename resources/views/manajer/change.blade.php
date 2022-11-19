@extends('layouts.main')

@section('container')
<h3> Integrate Change </h3>
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