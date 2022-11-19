@extends('layouts.main')

@section('container')
<h1>Control Scope</h1>
<a class="btn btn-primary mb-3" href="/manajer/conscope/create" data-toggle="modal" data-target="#addModal">
  <span>Tambah Data</span> 
</a>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate5">
      <span>Project Plan Update</span> 
  </a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/con-scope') }}">
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
                      <label for="task">WBS Task</label>
                      <textarea class="form-control" id="task" name="task" rows="3" placeholder="task"></textarea>
                  </fieldset>
                  <fieldset class="form-group">
                      <label for="complete">% Complete</label>
                      <textarea class="form-control" id="complete" name="complete" rows="3" placeholder="complete"></textarea>
                  </fieldset>
                   <fieldset class="form-group">
                       <label for="spent">% Spent</label>
                       <textarea class="form-control" id="spent" name="spent" rows="3" placeholder="spent"></textarea>
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
          <th>WBS Task</th>
          <th>% Complete</th>
          <th>% Spent</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($scope as $s)
        <tr>
          <td>{{ $s->project }}</td>
          <td>{{ $s->task }}</td>
          <td>{{ $s->complete }}</td>
          <td>{{ $s->spent }}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportscope/{{ $s->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection