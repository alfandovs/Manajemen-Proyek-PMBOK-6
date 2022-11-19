@extends('layouts.main')

@section('container')
<h3> Work Knowledge </h3>
<a class="btn btn-primary mb-3" href="/manajer/knowledge/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate">
      <span>Project Plan Update</span> 
  </a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/knowledge') }}">
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
                  <div class="form-group">
                    <label for="raised">Date Raised</label>
                    <input type="date" class="form-control" id="raised_date" name="raised_date" placeholder="raised">
                </div>
                     <fieldset class="form-group">
                        <label for="event">Event (What Happen)</label>
                        <textarea class="form-control" id="event" name="event" rows="3" placeholder="event"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="early">Early Warning</label>
                        <textarea class="form-control" id="early" name="early" rows="3" placeholder="early"></textarea>
                    </fieldset>
                     <fieldset class="form-group">
                         <label for="recomendation">Recomendation</label>
                         <textarea class="form-control" id="recomendation" name="recomendation" rows="3" placeholder="recomendation"></textarea>
                     </fieldset>
                     <fieldset class="form-group">
                       <label for="action">Action</label>
                       <textarea class="form-control" id="action" name="action" rows="3" placeholder="action"></textarea>
                   </fieldset>
                   <fieldset class="form-group">
                    <label for="status">Status</label>
                    <textarea class="form-control" id="status" name="status" rows="3" placeholder="status"></textarea>
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
          <th>Date Raised</th>
          <th>Owner</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($knowledge as $k)
        <tr>
          <td>{{ $k->project }}</td>
          <td>{{ $k->raised }}</td>
          <td>Project Manager</td>
          <td>{{ $k->status}}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE');
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportlearned/{{ $k->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection