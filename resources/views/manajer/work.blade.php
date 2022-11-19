@extends('layouts.main')

@section('container')
<a class="btn btn-primary mb-3" href="/manajer/work/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="float-right">
<a class="btn btn-primary mb-3" href="/manajer/work-data">
    <span>Work Perfomance Data</span> 
</a>
<a class="btn btn-primary mb-3" href="/manajer/issue">
  <span>Issue Log</span> 
</a>
<a class="btn btn-primary mb-3" href="/exportproject">
  <span>Dokumen Project</span> 
</a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/work') }}">
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
                        <label for="deliverables">Deliverables</label>
                        <textarea class="form-control" id="deliverables" name="deliverables" rows="3" placeholder="deliverables"></textarea>
                    </fieldset>
                    {{-- <fieldset class="form-group">
                        <label for="issue">Issue Log</label>
                        <textarea class="form-control" id="issue" name="issue" rows="3" placeholder="issue"></textarea>
                    </fieldset> --}}
                     <fieldset class="form-group">
                         <label for="change">Change Request</label>
                         <textarea class="form-control" id="change" name="change" rows="3" placeholder="change"></textarea>
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
          <th>Deliverables</th>
          <th>Change Request</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($work as $w)
        <tr>
          <td>{{ $w->project}}</td>
          <td>{{ $w->deliverables}}</td>
          <td>{{ $w->change}}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportwork/{{ $w->project_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
 @endsection