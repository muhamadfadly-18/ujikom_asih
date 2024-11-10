@extends('layout.backend.app',[
    'title' => 'Manage Informasi',
    'pageTitle' =>'Manage Informasi',
])

@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="notify"></div>

<div class="card">
    <div class="card-header">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
          Tambah Data
        </button>
    </div>
        <div class="card-body">
            <div class="table-responsive">    
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>judul</th>
                            <th>deskripsi</th>
                            <th>foto</th>
                           
                            <th>Kategori_id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create-modalLabel">Create Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="createForm">
        <div class="form-group">
            <label for="n">Name</label>
            <input type="" required="" id="n" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label for="e">deskripsi</label>
            <input type="" required="" id="e" name="deskripsi" class="form-control">
        </div>

        <div class="form-group">
          <label for="p">foto</label>
          <input type="file" required="" id="foto" name="foto" class="form-control">
      </div>
        
        <div class="form-group">
          <label for="kategori_id">Kategori</label>
          <select id="kategori_id" name="kategori_id" class="form-control" required>
              <option value="">Pilih Kategori</option>
              @foreach ($kategori as $item)
                  <option value="{{ $item->id }}">{{ $item->kategori }}</option>
              @endforeach
          </select>
      </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-store">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Create -->

<!-- Modal Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
        <div class="form-group">
            <label for="name">judul</label>
            <input type="hidden" required="" id="id" name="id" class="form-control">
            <input type="" required="" id="judul" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label for="deskripsi">deskripsi</label>
            <input type="" required="" id="deskripsi" name="deskripsi" class="form-control">
        </div>
        <div class="form-group">
          <label for="p">foto</label>
          <img id="currentPhoto" src="" width="100" height="100" style="display:none;" alt="Current Photo">
          <input type="file" id="foto" name="foto" class="form-control">
      </div>
      
        <div class="form-group">
          <label for="kategori_id">Kategori</label>
          <select id="kategori_id" name="kategori_id" class="form-control" >
              <option value="">Pilih Kategori</option>
              @foreach ($kategori as $item)
                  <option value="{{ $item->id }}" {{ $item->id ? 'selected' : '' }}>
                      {{ $item->kategori }}
                  </option>
              @endforeach
          </select>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-update">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->

<!-- Destroy Modal -->
<div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="destroy-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger btn-destroy">Hapus</button>
      </div>
    </div>
  </div>
</div>
<!-- Destroy Modal -->

@stop

@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

<script type="text/javascript">

$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('informasi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'judul', name: 'judul'},
            {data: 'deskripsi', name: 'deskripsi'},
            {
                data: 'foto',
                name: 'foto',
                render: function(data, type, full, meta) {
                    return '<img src="/img/' + data + '" alt="Foto" width="50" height="50"/>';
                },
                orderable: false,
                searchable: false
            },
            {data: 'kategori', name: 'kategori'},
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ]
    });
});




    // Reset Form
        function resetForm(){
            $("[name='judul']").val("")
            $("[name='deskripsi']").val("")
            $("[name='foto']").val("")
        }
    //

    // Create 

    $("#createForm").on("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    console.log(formData.get('kategori_id')); // Debugging line
    console.log(formData); // Debugging line

    $.ajax({
        url: "/admin/informasi",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            $("#create-modal").modal("hide");
            $('.data-table').DataTable().ajax.reload();
            flash("success", "Data berhasil ditambah");
            resetForm();
        },
        error: function(xhr) {
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            for (var key in errors) {
                errorMessage += errors[key] + '<br>';
            }
            flash("danger", errorMessage);
        }
    });
});

    // Create

    // Edit & Update
    $('body').on("click", ".btn-edit", function () {
    var id = $(this).attr("id")

    $.ajax({
        url: "/admin/informasi/" + id + "/edit",
        method: "GET",
        success: function (response) {
            $("#edit-modal").modal("show");
            $("#id").val(response.id);
            $("#judul").val(response.judul);
            $("#deskripsi").val(response.deskripsi);
            $("#kategori_id").val(response.kategori_id);

            // Set the source of the current photo and show the image
            if (response.foto) {
                $("#currentPhoto").attr("src", "/img" + response.foto).show();
            } else {
                $("#currentPhoto").hide();
            }
        }
    });
});


    $("#editForm").on("submit",function(e){
        e.preventDefault()
        var id = $("#id").val()

        $.ajax({
            url: "/admin/informasi/"+id,
            method: "PATCH",
            data: $(this).serialize(),
            success:function(){
                $('.data-table').DataTable().ajax.reload();
                $("#edit-modal").modal("hide")
                flash("success","Data berhasil diupdate")
            }
        })
    })
    //Edit & Update

    $('body').on("click",".btn-delete",function(){
        var id = $(this).attr("id")
        $(".btn-destroy").attr("id",id)
        $("#destroy-modal").modal("show")
    });

    $(".btn-destroy").on("click",function(){
        var id = $(this).attr("id")

        $.ajax({
            url: "/admin/informasi/"+id,
            method: "DELETE",
            success:function(){
                $("#destroy-modal").modal("hide")
                $('.data-table').DataTable().ajax.reload();
                flash('success','Data berhasil dihapus')
            }
        });
    })

    function flash(type,message){
        $(".notify").html(`<div class="alert alert-`+type+` alert-dismissible fade show" role="alert">
                              `+message+`
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`)
    }

</script>
@endpush