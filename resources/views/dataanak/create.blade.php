@extends('layout.app')
@section('title', 'dataanak')
@section('content')

<div class="container">
        <h1>Data Anak</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
<form method="post" action="{{url('dataanak',['tambah'])}}">
				@csrf
				<div class="">						
					<h4>Tambah Data Anak</h4>
					<button type="button" class="close"  aria-hidden="true">&times;</button>
				</div>
			
                <div class="form-group">
						<label>ID Anak</label>
						<input name="id_anak" type="text" class="form-control" required>
					</div>

                <div class="form-group">
						<label>NO KK</label>
						<input name="no_kk" type="number" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Nama anak</label>
						<input name="nama_anak" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input name="tanggal_lahir" type="date" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select name="jenis_kelamin">
							<option value="perempuan">Perempuan</option>
							<option value="laki-laki">Laki-laki</option>
						</select>
					</div>
                    <div class="form-group">
						<label>nama Orangtua</label>
						<input name="nama_orangtua" type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Anak Ke</label>
						<input name="anak_ke" type="number" class="form-control" required>
					</div>		
                    <div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" required>
					</div>							
				</div>
					<input type="button" class="btn btn-default" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>