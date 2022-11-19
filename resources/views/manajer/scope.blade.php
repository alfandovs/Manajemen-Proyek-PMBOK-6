@extends('layouts.main')

@section('container')
<h3> Project Scope Plan </h3>
<div class="float-left">
<a class="btn btn-primary mb-3" href="/manajer/scope/create" data-toggle="modal" data-target="#addModal">
  <span>Tambah Scope</span> 
</a>
</div>
<div class="float-right">
  <a class="btn btn-primary mb-3" href="/manajer/scopestat">
    <span>Project Scope Statement</span>
  </a>
</div>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/scope') }}">
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
                    @foreach ($data as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                      </select>
                </div>
                   <fieldset class="form-group">
                      <label for="requiremens">Requiremens Collection:</label>
                      <textarea class="form-control" id="requiremens" name="requiremens" rows="3" placeholder="requiremens"></textarea>
                  </fieldset>
                  <fieldset class="form-group">
                      <label for="categories">Categories:</label>
                      <textarea class="form-control" id="categories" name="categories" rows="3" placeholder="categories"></textarea>
                  </fieldset>
                   <fieldset class="form-group">
                       <label for="prioriti">Prioritization:</label>
                       <textarea class="form-control" id="prioriti" name="prioriti" rows="3" placeholder="prioriti"></textarea>
                   </fieldset>
                   <fieldset class="form-group">
                     <label for="treacebility">Treacebility:</label>
                     <textarea class="form-control" id="treacebility" name="treacebility" rows="3" placeholder="treacebility"></textarea>
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
          <th>Name PIC</th>
          <th>Name Klien</th>
          <th>Name Project</th>
          <th>Tujuan</th>
          <th>Dokumen</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $p)
        <tr>
          <td>{{ $p->employe }}</td>
          <td>{{ $p->client }}</td>
          <td>{{ $p->name }}</td>
          <td>{{ $p->tujuan }}</td>
          <td>
            <form action="{{ url("manajer/project/") }}" method="post">
              @csrf
              <a href="/exportscope2/{{ $p->id }}" target="_blank" class="btn btn-info ft-file-minus"> Scope & Require</a>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection