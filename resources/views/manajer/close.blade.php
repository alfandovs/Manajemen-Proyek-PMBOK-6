@extends('layouts.main')

@section('container')
<h3> Final Project </h3>
</a>
<a class="btn btn-primary mb-3" href="/exportproject2">
  <span>Dokumen Project</span> 
</a>
</form>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Name PIC</th>
          <th>Name Klien</th>
          <th>Name Project</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Cost</th>
          <th>History Cost</th>
          <th>Dokumen Final</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $projects)
        <tr>
          <td>{{ $projects->employe }}</td>
          <td>{{ $projects->client }}</td>
          <td>{{ $projects->name }}</td>
          <td>{{ $projects->start }}</td>
          <td>{{ $projects->end }}</td>
          <td>Rp.{{ number_format($projects->cost!=null?$projects->cost:0, 2, ',','.') }} </td>
          <td>
            <a href="/manajer/history/{{ $projects->id }}" class="btn btn-success ft-eye"> Lihat</a>
          </td>
          <td>
            <form action="{{ url("manajer/project/$projects->id") }}" method="post">
              <a href="#" onclick="get_edit({{ $projects->id }})" class="btn btn-warning editbtn ft-edit-3" data-toggle="modal" data-target="#eddModal"></a>
                @method('DELETE')
                @csrf
                <a href="/exportclose/{{ $projects->id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection