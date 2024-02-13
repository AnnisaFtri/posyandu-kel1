@extends('layout.app')
@section('title', 'jenispelayanan')
@section('content')

<div class="container-xl" style="margin-left: 300px; width: 100%; ">
  <div class="table-responsive">
    <div class="table-title">
      <div class="row">
        <div class="col-10">
          <h2>Jenis Pelayanan</h2>
        </div>
        <div class="col-sm-2">
          <a href="#addEmployeeModal" class="btn btn-success" style="width: 150px;" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah</span></a>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover" border-radius:50px;>
      <thead>
        <tr>
            <span class="custom-checkbox">
            </span>
        </tr>
        <tr>
          <th>id</th>
          <th style="text-align: center;">Jenis Pelayanan</th>
          <th style="text-align: center;">Tanggal Pelayanan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($jenis_pelayanans as $j)
          <tr>
              <th scope="row">{{ $j->id_pelayanan}}</th>
              <td>{{ $j->jenis_pelayanan }}</td>
              <td>{{ $j->tanggal_pelayanan }}</td>
              <td>
              <a href="#deleteEmployeeModal" class="btn btn-danger btn_delete" style="width: 150px;" data-toggle="modal" idAnak="{{ $j->id_pelayanan }}" data-target="#deleteEmployeeModal">
                  <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                </a>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>

      <!--tambah Modal HTML -->
      <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('jenispelayanan', ['tambah']) }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pelayanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>id pelayanan</label>
                            <input name="id_pelayanan" type="number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>jenis pelayanan</label>
                            <input name="jenis_pelayanan" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelayanan</label>
                            <input name="tanggal_pelayanan" type="date" class="form-control" required>
                        </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

 <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapusnya?</p>
                <input type="hidden" name="id_pelayanan" id="id_pelayanan"> <!-- Tambahkan id_pelayanan sebagai ID -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger final_btn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
$('.btn_delete').click(function() {
    var idPelayanan = $(this).attr('idAnak');
    $('#id_pelayanan').val(idPelayanan); // Set the value of the hidden input field
});

$('.final_btn').click(function() {
    var idPelayanan = $('input[name="id_pelayanan"]').val();
    // Perform deletion using AJAX
    $.ajax({
        type: 'DELETE',
        url: '/jenispelayanan/hapus',
        data: {
            id_pelayanan: idPelayanan,
            _token: "{{ csrf_token() }}"
        },
        success: function(data) {
            location.reload(); // Reload the page after successful deletion
        }
    });
});
</script>
@endsection