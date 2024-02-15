@extends('layout.app')
@section('title', 'jenispelayan')
@section('content')

<div class="container-xl" style="margin-left: 100px; width: 100%; padding:0 0px;">
    <div class="table-responsive">
        <div class="table-title">
            <div class="row">
                <div class="col-10">
                    <h2>JENIS <b>PELAYANAN</b> </h2>
                </div>
                <div class="col-sm-2">
		
                    <a href="#addEmployeeModal" class="btn btn-success" style="width: 150px;" data-toggle="modal"><i
                            class="material-icons">&#xE147;</i> <span>Tambah</span></a> <br>
                    
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>id</th>
                    <th>Jenis Pelayanan</th>
                    <th>Tanggal Pelayanan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis_pelayanan as $index => $j)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $j->id_pelayanan }}</td>
                    <td>{{ $j->jenis_pelayanan }}</td>
                    <td>{{ $j->tanggal_pelayanan }}</td>
					<td style="width: 150px; padding: 0px;display : flex">
					
                    <a href="#deleteEmployeeModal" class="delete btn_delete" data-toggle="modal"
                                    idPelayanan="{{ $j->id_pelayanan }}"><i class="material-icons" data-toggle="tooltip"
                                        title="Delete">&#xE872;</i></a>

					
            </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
		</div>
	</div>        
</div>
<!--tambah Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{url('jenispelayanan',['tambah'])}}">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Tambah Jenis Pelayanan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <div class="form-group">
						<label>ID Pelayanan</label>
						<input name="id_pelayanan" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jenis Pelayanan</label>
						<input name="jenis_pelayanan" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tanggal pelayanan</label>
						<input name="tanggal_pelayanan" type="date" class="form-control" required>
					</div>
                </div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk menghapus nya?</p>
                    <input type="hidden" name="id_pelayanan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger final_btn">Delete</button>
                </div>
            </div>
        </div>
</div>


    <script>
        $(document).ready(function() {

            $('.btn_delete').click(function() {
                var idPelayanan = $(this).attr('idPelayanan');
                $('#deleteEmployeeModal input[name="id_pelayanan"]').val(idPelayanan);

                $('.final_btn').off('click').on('click', function() {
                    // console.log(idPelayanan);

                    $.ajax({
                        type: 'DELETE',
                        url: '/jenispelayanan/hapus',
                        data: {
                            id_pelayanan: idPelayanan,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });
            });

        })
            </script>


@endsection