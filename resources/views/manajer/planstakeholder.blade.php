@extends('layouts.main')

@section('container')
<h3> Plan Stakeholder</h3>
<a class="btn btn-primary mb-3" href="/manajer/planstakeholder/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate7">
      <span>Project Plan Update</span>
  </a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/planstakeholder') }}">
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
                    <label for="client_id">Nama Stakeholder</label>
                    <select id="client_id" class="form-control" name="client_id">
                      <option value="">-Pilih Stakeholder-</option>
                      @foreach ($client as $p)
                          <option value="{{ $p->id }}">{{ $p->name }}</option>
                      @endforeach
                        </select>
                  </div>
                     <fieldset class="form-group">
                        <label for="type">Stakeholder Type</label>
                        <textarea class="form-control" id="type" name="type" rows="3" placeholder="type"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="level">Level Support</label>
                        <textarea class="form-control" id="level" name="level" rows="3" placeholder="level"></textarea>
                    </fieldset>
                     <fieldset class="form-group">
                         <label for="ability">Ability Impact</label>
                         <textarea class="form-control" id="ability" name="ability" rows="3" placeholder="ability"></textarea>
                     </fieldset>
                     <fieldset class="form-group">
                       <label for="detail">Detail Stakeholder</label>
                       <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="detail"></textarea>
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
          <th>Name Klien</th>
          <th>Stakeholder Type</th>
          <th>Level Support</th>
          <th>Ability Impact</th>
          <th>Detail Stakeholder</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($plan as $p)
        <tr>
          <td>{{ $p->client }}</td>
          <td>{{ $p->type }}</td>
          <td>{{ $p->level }}</td>
          <td>{{ $p->ability }}</td>
          <td>{{ $p->detail }}</td>
          <td>
              <form action="" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger ft-trash"></button>
                  <a href="/exportstake/{{ $p->client_id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection