@extends('layouts.main')

@section('container')
<h3> Project Scope Statement </h3>
<div class="float-left">
<a class="btn btn-primary mb-3" href="/manajer/scopestat/create" data-toggle="modal" data-target="#addModal">
  <span>Tambah Data</span> 
</a>
</div>
<div class="float-right">
  <a class="btn btn-primary mb-3" href="/exportproject3">
    <span>Project Document Update</span>
  </a>
</div>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/scopestat') }}">
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Tambah Scope</h5>
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
                      <label for="description">Scope Description:</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="description"></textarea>
                  </fieldset>
                  <fieldset class="form-group">
                      <label for="deliverables">Project Deliverables:</label>
                      <textarea class="form-control" id="deliverables" name="deliverables" rows="3" placeholder="deliverables"></textarea>
                  </fieldset>
                   <fieldset class="form-group">
                       <label for="criteria">Acceptance Criteria:</label>
                       <textarea class="form-control" id="criteria" name="criteria" rows="3" placeholder="criteria"></textarea>
                   </fieldset>
                   <fieldset class="form-group">
                     <label for="constrain">Constrain:</label>
                     <textarea class="form-control" id="constrain" name="constrain" rows="3" placeholder="constrain"></textarea>
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
          <th>Constrain</th>
          <th>Dokumen</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($stat as $s)
        <tr>
          <td>{{ $s->project }}</td>
          <td>{{ $s->constrain }}</td>
          <td>
            <form action="{{ url("manajer/project/") }}" method="post">
              @csrf
              <a href="/exportstat/{{ $s->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection