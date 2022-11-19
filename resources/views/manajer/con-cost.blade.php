@extends('layouts.main')

@section('container')
<h1>Control Cost</h1>
<a class="btn btn-primary mb-3" href="/manajer/concost/create" data-toggle="modal" data-target="#addModal">
  <span>Tambah Data</span>
</a>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate6">
      <span>Project Plan Update</span>
  </a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/con-cost') }}">
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   </button>
               </div>
           <div class="modal-body">
                <div class="form-group">
                  <label for="project_id">Nama Project</label>
                  <select id="project_id" class="form-control" name="project_id">
                    <option value="">-Pilih Project-</option>
                    @foreach ($project as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                      </select>
                </div>
                   <fieldset class="form-group">
                      <label for="variance">Cost Variance</label>
                      <textarea class="form-control" id="variance" name="variance" rows="3" placeholder="variance"></textarea>
                  </fieldset>
                  <fieldset class="form-group">
                      <label for="index">Cost Performance Index</label>
                      <textarea class="form-control" id="index" name="index" rows="3" placeholder="index"></textarea>
                  </fieldset>
               </div>
                 <div class="modal-footer">
                   <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
           </div>
       </div>
</form>
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Name Project</th>
          <th>Cost Variance</th>
          <th>Cost Performance</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cost as $c)
        <tr>
          <td>{{ $c->project }}</td>
          <td>{{ $c->variance }}</td>
          <td>{{ $c->index }}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportcost/{{ $c->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection