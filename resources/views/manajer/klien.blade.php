@extends('layouts.main')

@section('container')
<h3> Stakeholder Register </h3>
<a class="btn btn-primary mb-3" href="/manajer/karyawan/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span> 
</a>
<form class="float-right">
  <a class="btn btn-primary mb-3" href="/exportpdf">
      <span>Register Pdf</span> 
  </a>
  <a class="btn btn-primary mb-3" href="/exportpdf2">
      <span>Change Pdf</span> 
  </a>
  <a class="btn btn-primary mb-3" href="/exportplanupdate4">
    <span>Project Plan Pdf</span> 
</a>
</form>
@if (session()->has('sukses'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
{{-- modal --}}
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/klien') }}">
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
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Klien">
                    </div>
                    <div class="form-group">
                        <label for="addres">Addres</label>
                        <input type="text" class="form-control" id="addres" name="addres" placeholder="Alamat Klien">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Nomor Telfon">
                    </div>
                </div>
                    <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
</form>
<form class="modal fade" id="eddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url("/manajer/klien")}}">
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
                       <label for="name">Nama</label>
                       <input type="text" class="form-control" value="" id="ed-name" name="name" placeholder="Nama Klien">
                   </div>
                   <div class="form-group">
                       <label for="addres">Addres</label>
                       <input type="text" class="form-control" id="ed-addres" name="addres" placeholder="Alamat Klien">
                   </div>
                   <div class="form-group">
                       <label for="phone">Phone</label>
                       <input type="number" class="form-control" id="ed-phone" name="phone" placeholder="Nomor Telfon">
                   </div>
               </div>
                   <div class="modal-footer">
                   <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                   <button type="submit" class="btn btn-primary">Ubah</button>
                   </div>
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
          <th>No.</th>
          <th>Name</th>
          <th>Addres</th>
          <th>Dokumen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1 ?>
        @foreach ($data as $clients)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $clients->name }}</td>
          <td>{{ $clients->addres }}</td>
          <td>{{ $clients->phone }}</td>
          <td>
            <form action="{{ url("manajer/klien/$clients->id") }}" method="post" class="d-inline">
              <a href="#" onclick="get_edit({{ $clients->id }})" class="btn btn-warning editbtn ft-edit-3" data-toggle="modal" data-target="#eddModal"></a>
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

  <script type="text/javascript">
    function get_edit(id){
      $.ajax({
       type: "GET", // Method pengiriman data bisa dengan GET atau POST
        url: "/manajer/klien/"+id, // Isi dengan url/path file php yang dituju
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
          $('#ed-name').val(response['name']);
          $('#ed-addres').val(response['addres']);
          $('#ed-phone').val(response['phone']);
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