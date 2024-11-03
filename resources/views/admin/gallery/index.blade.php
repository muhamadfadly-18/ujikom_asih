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
                            <th>text</th>
                            <th>tanggal</th>
                            <th>foto</th>
                           
                           
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
            <input type="" required="" id="n" name="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="e">tanggal</label>
            <input type="date" required="" id="e" name="tanggal" class="form-control">
        </div>

        <div class="form-group">
          <label for="p">foto</label>
          <input type="file" required="" id="foto" name="foto" class="form-control">
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
            <label for="name">text</label>
            <input type="hidden" required="" id="id" name="id" class="form-control">
            <input type="" required="" id="text" name="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">tanggal</label>
            <input type="date" required="" id="tanggal" name="tanggal" class="form-control">
        </div>
        <div class="form-group">
          <label for="p">foto</label>
          <img id="currentPhoto" src="" width="100" height="100" style="display:none;" alt="Current Photo">
          <input type="file" id="foto" name="foto" class="form-control">
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
        ajax: "{{ route('gallery.index') }}",
        columns: [
            {data: 'DT_RowIndex' , name: 'id'},
            {data: 'text', name: 'text'},
            {data: 'tanggal', name: 'tanggal'},
            {
            data: 'foto', 
            name: 'foto',
            render: function(data) {
                return `<img src="/${data}" width="50" height="50">`;
            }
        },
           
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ]
    });
  });


    // Reset Form
        function resetForm(){
            $("[name='text']").val("")
            $("[name='tanggal']").val("")
            $("[name='foto']").val("")
        }
    //

    // Create 

    $("#createForm").on("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    
    console.log(formData); // Debugging line

    $.ajax({
        url: "/admin/gallery",
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
        url: "/admin/gallery/" + id + "/edit",
        method: "GET",
        success: function (response) {
            $("#edit-modal").modal("show");
            $("#id").val(response.id);
            $("#text").val(response.text);
            $("#tanggal").val(response.tanggal);
          

            // Set the source of the current photo and show the image
            if (response.foto) {
                $("#currentPhoto").attr("src", "/" + response.foto).show();
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
            url: "/admin/gallery/"+id,
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
            url: "/admin/gallery/"+id,
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