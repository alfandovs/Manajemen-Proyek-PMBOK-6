@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/manajer/issue/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="float-right">
<a class="btn btn-primary mb-3" href="/manajer/work-data">
    <span>Work Perfomance Data</span> 
</a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/issue') }}">
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
                        <label for="issue">Issue Tittle</label>
                        <textarea class="form-control" id="issue" name="issue" rows="3" placeholder="issue"></textarea>
                    </fieldset>
                    <div class="form-group">
                        <label for="report">Report Date</label>
                        <input type="date" class="form-control" id="report_date" name="report_date" placeholder="report">
                    </div>
                     <fieldset class="form-group">
                         <label for="reportby">Report By</label>
                         <textarea class="form-control" id="reportby" name="reportby" rows="3" placeholder="reportby"></textarea>
                     </fieldset>
                     <fieldset class="form-group">
                        <label for="priority">Priority</label>
                        <textarea class="form-control" id="priority" name="priority" rows="3" placeholder="priority"></textarea>
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
          <th>Issue Tittle</th>
          <th>Report Date</th>
          <th>Report By</th>
          <th>Priority</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($issue as $i)
        <tr>
          <td>{{ $i->project }}</td>
          <td>{{ $i->issue }}</td>
          <td>{{ $i->report }}</td>
          <td>{{ $i->reportby }}</td>
          <td>{{ $i->priority }}</td>
          <td>{{ $i->status }}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportissue/{{ $i->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
 @endsection