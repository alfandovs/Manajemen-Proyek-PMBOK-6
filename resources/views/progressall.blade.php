@extends('layouts.main')

@section('container')
<p>
<center><h1>Semua Progress</h1></center>
</p>
<form class="float-right">
  <a class="btn btn-primary mb-3 ft-file" href="/exportplanupdate2">
      <span>Project Plan Update</span> 
  </a>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/progressall') }}">
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   </button>
               </div>
               <div class="modal-body" id="">
                <fieldset class="form-group">
                  <label for="revisi">Revisi</label>
                  <textarea class="form-control" id="saran" name="saran" rows="3" placeholder="revisi" value="" ></textarea>
                </fieldset>
               </div>
                   <div class="modal-footer">
                   <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                   <button type="submit" class="btn btn-primary">Simpan</button>
                   </div>
               </div>
           </div>
       </div>
</form>
<form class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{ url('/progressall') }}">
  @csrf    
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   </button>
               </div>
               <div class="modal-body">
                <fieldset class="form-group">
                  <label for="revisi">Revisi</label>
                  <textarea class="form-control" id="saran1" name="saran1" rows="3" placeholder="revisi" value=""></textarea>
                </fieldset>
               </div>
            </div>
        </div>
</form>


<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Project</th>
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1 ?>
        @foreach($data as $p)
        <tr>
            <td><?php echo $i; $i++;?></td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->deskripsi }}</td>
            <td>
              <a href="{{ url("/progress/$p->id") }}" class="btn btn-primary editbtn ft-eye"></a>
              <a href="{{ url("/progress/edit/$p->id") }}" class="btn btn-success ft-plus"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>

@endsection