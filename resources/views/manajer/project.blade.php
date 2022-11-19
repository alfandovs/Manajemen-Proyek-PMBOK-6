@extends('layouts.main')

@section('container')
<h3> Project Management Plan </h3>
<a class="btn btn-primary mb-3" href="/manajer/project/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Project</span> 
</a>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
{{-- modal --}}
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/project') }}">
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
                  <label for="employe_id">Nama PIC</label>
                  <select id="employe_id" class="form-control" name="employe_id">
                    <option value="">-Pilih PIC-</option>
                    @foreach ($employe as $e)
                        @if($e->active_project < 3)
                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endif
                    @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="client_id">Nama Klien</label>
                    <select id="client_id" class="form-control" name="client_id">
                        <option value="name">-Pilih Klien-</option>
                      @foreach ($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                </div>
                     <div class="form-group">
                        <label for="nama">Nama Project</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Project">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End">
                    </div>
                    <fieldset class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <textarea class="form-control" id="tujuan" name="tujuan" rows="3" placeholder="Tujuan"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
                  </fieldset>
                  <div class="form-group">
                    <label>Pilih Status</label>
                  <div class="form-control">
                  <input type="radio" class="btn-check" name="status" id="run2" autocomplete="off" value="run">
                  <label for="run2" class="badge badge-warning" >Run</label>
                  <input type="radio" class="btn-check ml-2" name="status" id="close2" autocomplete="off" value="close" >
                  <label for="close2" class="badge badge-success">Close</label>
                  </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
            </div>
        </div>
</form>
<form class="modal fade" id="eddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url("/manajer/project")}}">
  @method('PATCH')
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                  <input type="hidden" id="ed-id" name="id">
                   <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   </button>
               </div>
               <div class="modal-body">
                <div class="form-group">
                  <label for="employe_id">Nama PIC</label>
                  <select id="ed-employe_id" class="form-control" name="employe_id">
                    <option value="">-Pilih PIC-</option>
                    @foreach ($employe as $e)
                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                    @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="client_id">Nama Klien</label>
                    <select id="ed-client_id" class="form-control" name="client_id">
                        <option value="name">-Pilih Klien-</option>
                      @foreach ($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                </div>
                     <div class="form-group">
                        <label for="nama">Nama Project</label>
                        <input type="text" class="form-control" id="ed-name" name="name" placeholder="Nama Project">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date</label>
                        <input type="date" class="form-control" id="ed-start_date" name="start_date" placeholder="Start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date</label>
                        <input type="date" class="form-control" id="ed-end_date" name="end_date" placeholder="End">
                    </div>
                    <fieldset class="form-group">
                      <label for="tujuan">Tujuan</label>
                    <textarea class="form-control" id="ed-tujuan" name="tujuan" rows="3" placeholder="Tujuan"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="ed-deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi"></textarea>
                    </fieldset>
                    <div class="form-group">
                      <label>Pilih Status</label>
                    <div class="form-control">
                    <input type="radio" class="btn-check radio-status" name="status" id="run" autocomplete="off" value="run">
                    <label for="run" class="badge badge-warning">Run</label>
                    <input type="radio" class="btn-check radio-status ml-2" name="status" id="close" autocomplete="off" value="close" >
                    <label for="close" class="badge badge-success">Close</label>
                    </div>
                    </div>
                </div>
                   <div class="modal-footer">
                   <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                   <button type="submit" class="btn btn-primary">Ubah</button>
                   </div>
               </div>
           </div>
</form>
{{-- modal --}}
@if (session()->has('success'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Name PIC</th>
          <th>Name Klien</th>
          <th>Name Project</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Cost</th>
          <th>Status Project</th>
          <th>History Cost</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $projects)
        <tr>
          <td>{{ $projects->employe }}</td>
          <td>{{ $projects->client }}</td>
          <td>{{ $projects->name }}</td>
          <td>{{ $projects->start }}</td>
          <td>{{ $projects->end }}</td>
          <td>Rp.{{ number_format($projects->cost!=null?$projects->cost:0, 2, ',','.') }} </td>
          <td><i class="fa {{ $projects->status=="Run"?"fa-refresh spinner":"fa-check" }}"></i> {{ $projects->status }}</td>
          <td>
            <a href="/manajer/history/{{ $projects->id }}" class="btn btn-success ft-eye"> Lihat</a>
          </td>
          <td>
            <form action="{{ url("manajer/project/$projects->id") }}" method="post">
              <a href="#" onclick="get_edit({{ $projects->id }})" class="btn btn-warning editbtn ft-edit-3" data-toggle="modal" data-target="#eddModal"></a>
                @method('DELETE')
                @csrf
                <button class="btn btn-danger ft-trash"></button>
                <a href="/exportplan/{{ $projects->id }}" target="_blank" class="btn btn-info ft-file-minus"></a>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

  <script type="text/javascript">
    function get_edit(id){
      $.ajax({
       type: "GET", // Method pengiriman data bisa dengan GET atau POST
        url: "/manajer/project/"+id, // Isi dengan url/path file php yang dituju
        // data: {id_user : id}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $('#ed-id').val(response['id']);
          $('#ed-employe_id').val(response['employe_id']);
          $('#ed-client_id').val(response['client_id']);
          $('#ed-name').val(response['name']);
          $('#ed-start_date').val(response['start']);
          $('#ed-end_date').val(response['end']);
          $('#ed-biaya').val(response['biaya']);
          $('#ed-tujuan').val(response['tujuan']);
          $('#ed-deskripsi').val(response['deskripsi']);
          $('#ed-status').val(response['status']);
          $('.radio-status').removeAttr('checked');
          $('#'+response['status'].toLowerCase()).attr('checked', 'checked');
          var action = $('#eddModal').attr('action');
          action += "/"+response['id'];
          // alert(action);
          $('#eddModal').attr('action', action);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    };
</script>
@endsection