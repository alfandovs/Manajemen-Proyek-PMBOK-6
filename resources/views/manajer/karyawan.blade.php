@extends('layouts.main')

@section('container')
<h3> Data Anggota </h3>
<a class="btn btn-primary mb-3" href="/manajer/karyawan/create" data-toggle="modal" data-target="#addModal">
    <span>Tambah Data</span>
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
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/manajer/karyawan') }}">
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
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anggota">
                    </div>
                    <div class="form-group">
                        <label for="posisi">posisi</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Posisi Anggota">
                    </div>
                    <div class="form-group">
                        <label for="skill">Keahlian</label>
                        <input type="text" class="form-control" id="skill" name="skill" placeholder="Keahlian">
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
<form class="modal fade" id="eddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url("/manajer/karyawan")}}">
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
                       <label for="nama">Nama</label>
                       <input type="text" class="form-control" value="" id="ed-name" name="name" placeholder="Nama Anggota">
                   </div>
                   <div class="form-group">
                       <label for="posisi">Posisi</label>
                       <input type="text" class="form-control" id="ed-position" name="position" placeholder="Posisi Anggota">
                   </div>
                   <div class="form-group">
                       <label for="skill">Keahlian</label>
                       <input type="text" class="form-control" id="ed-skill" name="skill" placeholder="Keahlian">
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
          <th>Position</th>
          <th>Skill</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach ($data as $employes)
        <tr>
          <td><?php echo $i; $i++;?></td>
          <td>{{ $employes->name }}</td>
          <td>{{ $employes->position }}</td>
          <td>{{ $employes->skill }}</td>
          <td>
            <form action="{{ url("manajer/karyawan/$employes->id") }}" method="post" class="d-inline">
              <a href="#" onclick="get_edit({{ $employes->id }})" class="btn btn-warning editbtn ft-edit-3" data-toggle="modal" data-target="#eddModal"></a>
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
        url: "/manajer/karyawan/"+id, // Isi dengan url/path file php yang dituju
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
          $('#ed-position').val(response['position']);
          $('#ed-skill').val(response['skill']);
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