@extends('layouts.main')

@section('container')
<h3> Project Charter </h3>
<a class="btn btn-primary mb-3" href="/manajer/charter/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Charter</span> 
</a>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/charter') }}">
    @csrf    
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Project</h5>
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
                        <label for="asumsi">Asumsi</label>
                        <textarea class="form-control" id="asumsi" name="asumsi" rows="3" placeholder="asumsi"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="batasan">Batasan</label>
                        <textarea class="form-control" id="batasan" name="batasan" rows="3" placeholder="batasan"></textarea>
                    </fieldset>
                     <fieldset class="form-group">
                         <label for="resiko">Resiko</label>
                         <textarea class="form-control" id="resiko" name="resiko" rows="3" placeholder="resiko"></textarea>
                     </fieldset>
                     <fieldset class="form-group">
                       <label for="kriteria">Kriteria</label>
                       <textarea class="form-control" id="kriteria" name="kriteria" rows="3" placeholder="kriteria"></textarea>
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
          <th>Staholder</th>
          <th>Dokumen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($charter as $c)
        <tr>
          <td>{{ $c->project}}</td>
          <td>Project Manager</td>
          <td><a href="/exportpdf/{{ $c->project_id }}" target="_blank" class="btn btn-info ft-file-minus"> Donwload Pdf</a></td>
          <td>
              <form action="" method="post">
                <a href="#" onclick="get_edit({{ $c->project_id }})" class="btn btn-warning editbtn ft-edit-3" data-toggle="modal" data-target="#eddModal"></a>
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