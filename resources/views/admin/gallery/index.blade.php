@extends('layout.backend.app',[
    'title' => 'Manage Gallery',
    'pageTitle' => 'Manage Gallery',
])

@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .data-card {
        width: 250px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .data-card img {
    width: 200px; /* Set a fixed width */
    height: 150px; /* Set a fixed height */
    object-fit: cover; /* Ensures the image is cropped to fit within the dimensions */
    border-radius: 4px;
    margin-bottom: 10px;
}
</style>
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
        <div class="card-container row">    
            <!-- Data akan dimuat sebagai kartu di sini -->
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
              <label for="n">Text</label>
              <textarea required id="n" name="text" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <label for="e">Tanggal</label>
              <input type="date" required id="e" name="tanggal" class="form-control">
          </div>
          <div class="form-group">
            <label for="p">Foto</label>
            <input type="file" required id="foto" name="foto" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-store">Simpan</button>
          </div>
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
          <input type="hidden" id="id" name="id">
          <div class="form-group">
              <label for="text">Text</label>
              <textarea  id="n" name="text" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date"  id="tanggal" name="tanggal" class="form-control">
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <img id="currentPhoto" src="" width="100" height="100" style="display:none;" alt="Current Photo">
            <input type="file" id="foto" name="foto" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-update">Update</button>
          </div>
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
        <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus?</h5>
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
<script type="text/javascript">
  $(document).ready(function () {
    // Load data as cards
    function loadDataAsCards() {
        $.ajax({
            url: "{{ route('gallery.index') }}",
            method: "GET",
            success: function(data) {
              console.log(data);
                var container = $('.card-container');
                container.empty();
                data.data.forEach(function(item, index) {
                    var card = `
                        <div class="data-card">
                           
                            <img src="/img/${item.foto}" alt="Foto">
                            <p>Text: ${item.text}</p>
                            <p>Tanggal: ${item.tanggal}</p>
                            <button class="btn btn-primary btn-edit" id="${item.id}">Edit</button>
                            <button class="btn btn-danger btn-delete" id="${item.id}">Delete</button>
                        </div>
                    `;
                    container.append(card);
                });
            }
        });
    }

    // Call function to load data as cards
    loadDataAsCards();

    // Create functionality
    $("#createForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/admin/gallery",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                $("#create-modal").modal("hide");
                loadDataAsCards();
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

    // Edit & Update functionality
    $('body').on("click", ".btn-edit", function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "/admin/gallery/" + id + "/edit",
            method: "GET",
            success: function (response) {
                $("#edit-modal").modal("show");
                $("#id").val(response.id);
                $("#text").val(response.text);
                $("#tanggal").val(response.tanggal);
                if (response.foto) {
                    $("#currentPhoto").attr("src", "/" + response.foto).show();
                } else {
                    $("#currentPhoto").hide();
                }
            }
        });
    });

    $("#editForm").on("submit", function(e) {
        e.preventDefault();
        var id = $("#id").val();
        var formData = new FormData(this);
        $.ajax({
            url: "/admin/gallery/" + id,
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                loadDataAsCards();
                $("#edit-modal").modal("hide");
                flash("success", "Data berhasil diupdate");
            }
        });
    });

    // Delete functionality
    $('body').on("click", ".btn-delete", function(){
        var id = $(this).attr("id");
        $(".btn-destroy").attr("id", id);
        $("#destroy-modal").modal("show");
    });

    $(".btn-destroy").on("click", function(){
        var id = $(this).attr("id");
        $.ajax({
            url: "/admin/gallery/" + id,
            type: "DELETE",
            success: function(){
                loadDataAsCards();
                $("#destroy-modal").modal("hide");
                flash("success", "Data berhasil dihapus");
            }
        });
    });

    // Helper function to show flash messages
    function flash(type, message) {
        $(".notify").html(`<div class="alert alert-${type}">${message}</div>`);
        setTimeout(() => $(".notify").html(""), 3000);
    }

    // Helper function to reset form
    function resetForm() {
        $('#createForm')[0].reset();
        $("#currentPhoto").hide();
    }
  });
</script>
@endpush
