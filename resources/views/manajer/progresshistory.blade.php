@extends('layouts.main')

@section('container')
<p>
<h3>Semua Progress</h3>
</p>
    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>Gambar</th>
              <th>Progress</th>
              <th>Status</th>
              <th>Action</th>
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
            <td>
              <form action="{{ url("manajer/progresshistory/$pro->id") }}" method="post" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                </form>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
@endsection