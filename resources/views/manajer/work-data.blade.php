@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/manajer/work-data/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/work-data') }}">
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
                        <label for="estimate">Estimate Value</label>
                        <textarea class="form-control" id="estimate" name="estimate" rows="3" placeholder="estimate"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="planned">Planned Value</label>
                        <textarea class="form-control" id="planned" name="planned" rows="3" placeholder="planned"></textarea>
                    </fieldset>
                     <fieldset class="form-group">
                         <label for="actual">Actual Cost</label>
                         <textarea class="form-control" id="actual" name="actual" rows="3" placeholder="actual"></textarea>
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
          <th>Estimate Value</th>
          <th>Planned Value</th>
          <th>Actual Cost</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($work as $w)
        <tr>
          <td>{{ $w->project }}</td>
          <td>{{ $w->estimate }}</td>
          <td>{{ $w->planned }}</td>
          <td>{{ $w->actual }}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportworkdata/{{ $w->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
 @endsection