@extends('layout.app')
@section('title', 'detail')
@section('content')
<div id="detailEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/dataanak/detail" method="GET">
				<div class="modal-header">						
					<h4 class="modal-title">Edit</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
						@csrf
					<div class="form-group">
						<label>id anak</label>
						<input name="id_anak" type="text" class="form-control" required id="id_anak_detail">
					</div>
					<div class="form-group">
						<label>No KK</label>
						<input name="no_kk" type="number" class="form-control" required id="no_kk_detail">
					</div>
					<div class="form-group">
						<label>Nama Orangtua</label>
						<input name="nama_orangtua" type="text" class="form-control" required id="nama_orangtua_detail">
					</div>
					<div class="form-group">
						<label>Nama anak</label>
						<input name="nama_anak" type="text"  class="form-control" required id="nama_anak_detail">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="text" name="jenis_kelamin_detail" required id="jenis_kelamin_detail"
                                class="form-control">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input name="tanggal_lahir" type="date" class="form-control" required id="tanggal_lahir_detail">
					</div>		
					<div class="form-group">
						<label>Anak Ke</label>
						<input name="anak_ke" type="number" class="form-control" required id="anak_ke_detail">
					</div>		
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" required id="alamat_detail">
					</div>		
				</div>
				<div class="modal-footer">
					@if (session('flash_message_success'))
					<div class="alert alert-success">
						{{session ('flash_message_success') }}
					</div>
					@endif
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">																
				</div>
			</form>
		</div>
	</div>
</div>