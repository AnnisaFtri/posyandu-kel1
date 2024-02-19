@extends('layout.app')
@section('title', 'dataanak')
@section('content')

    <div class="container-xl" style="margin-left: 100px; width: 100%; padding:0 50px;">
        <div class="table-responsive">
            <div class="table-title">
                <div class="row">
                    <div class="col-10">
                        <h2>DATA <b>ANAK</b> </h2>
                   <div class="row">
                   <div class="row">
    <div class="col-sm-6 d-flex justify-content-center"> <!-- Menggunakan grid system Bootstrap untuk membagi kolom -->
    @if (Auth::user()->role == 'admin')
        <a href="#addEmployeeModal" class="btn btn-success" style="width: 150px;" data-toggle="modal">
            <i class="material-icons">&#xE147;</i> <span>Tambah</span>
        </a> 
    @endif
    </div>
    <div class="col-sm-6 d-flex justify-content-center justify-content-sm-end"> <!-- Menggunakan grid system Bootstrap untuk membagi kolom -->
        <a href="dataanak/cetak" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            </svg> Cetak PDF
        </a>
    </div>
</div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Anak</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        @if (Auth::user()->role == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anak as $index => $a)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $a->id_anak }}</td>
                            <td>{{ $a->nama_anak }}</td>
                            <td>{{ $a->alamat }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td style="width: 150px; padding: 0px;display : flex">
                                <a href="#editEmployeeModal" class="edit btn_edit" data-toggle="modal"
                                    idAnak="{{ $a->id_anak }}"><i class="material-icons" data-toggle="tooltip"
                                        title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete btn_delete" data-toggle="modal"
                                    idAnak="{{ $a->id_anak }}"><i class="material-icons" data-toggle="tooltip"
                                        title="Delete">&#xE872;</i></a>
                                <a href="#detailEmployeeModal" class="detail btn_detail" data-toggle="modal"
                                    idAnak="{{ $a->id_anak }}"><i class="bi bi-book" data-toggle="tooltip"
                                        title="Detail"></i></a>
                            </td>
                            @endif
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
                <form method="post" action="{{ url('dataanak', ['tambah']) }}">
                    @csrf
                    <div class="modal-header">

                        <h4 class="modal-title">Tambah Data Anak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
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
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/dataanak/update" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>id anak</label>
                            <input name="id_anak" type="text" class="form-control" required id="id_anak">
                        </div>
                        <div class="form-group">
                            <label>No KK</label>
                            <input name="no_kk" type="number" class="form-control" required id="no_kk">
                        </div>
                        <div class="form-group">
                            <label>Nama Orangtua</label>
                            <input name="nama_orangtua" type="text" class="form-control" required id="nama_orangtua">
                        </div>
                        <div class="form-group">
                            <label>Nama anak</label>
                            <input name="nama_anak" type="text" class="form-control" required id="nama_anak">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select>
                                <option value="perempuan" id="perempuan">Perempuan</option>
                                <option value="laki-laki" id="laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" class="form-control" required id="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label>Anak Ke</label>
                            <input name="anak_ke" type="number" class="form-control" required id="anak_ke">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control" required id="alamat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                        @if (session('flash_message_success'))
                            <div class="alert alert-success">
                                {{ session('flash_message_success') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Detail Modal HTML -->
    <div id="detailEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/dataanak/detail" method="GET">
                    <div class="modal-header">
                        <a href="dataanak/cetak">
                        <btn class="btn btn-success ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>Cetak PDF
                        </btn>
                    </a>
                        <h4 class="modal-title">Detail</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>id anak</label>
                            <input name disabled="id_anak" type="text" class="form-control" required id="id_anak_detail">
                        </div>
                        <div class="form-group">
                            <label>No KK</label>
                            <input name disabled="no_kk" type="number" class="form-control" required id="no_kk_detail">
                        </div>
                        <div class="form-group">
                            <label>Nama Orangtua</label>
                            <input name disabled="nama_orangtua" type="text" class="form-control" required
                                id="nama_orangtua_detail">
                        </div>
                        <div class="form-group">
                            <label>Nama anak</label>
                            <input name disabled="nama_anak" type="text" class="form-control" required id="nama_anak_detail">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type disabled="text" name="jenis_kelamin_detail" required id="jenis_kelamin_detail"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input name disabled="tanggal_lahir" type="date" class="form-control" required
                                id="tanggal_lahir_detail">
                        </div>
                        <div class="form-group">
                            <label>Anak Ke</label>
                            <input name disabled="anak_ke" type="number" class="form-control" required id="anak_ke_detail">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name disabled="alamat" type="text" class="form-control" required id="alamat_detail">
                        </div>
                    </div>

                    <div class="modal-footer">
                       
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
                    <input type="hidden" name="id_anak">
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
            // console.log('tes');

            $('.btn_edit').click(function() {
                var idAnak = $(this).attr('idAnak');
                $.ajax({
                    type: 'POST',
                    url: '/dataanak/edit',
                    data: {
                        id_anak: idAnak,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#id_anak').val(data.id_anak)
                        $('#no_kk').val(data.no_kk)
                        $('#nama_orangtua').val(data.nama_orangtua)
                        $('#nama_anak').val(data.nama_anak)
                        $('#tanggal_lahir').val(data.tanggal_lahir)
                        $('#anak_ke').val(data.anak_ke)
                        $('#alamat').val(data.alamat)
                        $('#perempuan').prop('selected', (data.jenis_kelamin == 'perempuan') ?
                            true : false)
                        $('#laki-laki').prop('selected', (data.jenis_kelamin == 'laki-laki') ?
                            true : false)
                    }
                })
            })

            $('.btn_detail').click(function() {
                var idAnak = $(this).attr('idAnak');
                console.log('tes')
                $.ajax({
                    type: 'GET',
                    url: '/dataanak/detail',
                    data: {
                        id_anak: idAnak,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id_anak_detail').val(data.id_anak)
                        $('#no_kk_detail').val(data.no_kk)
                        $('#nama_orangtua_detail').val(data.nama_orangtua)
                        $('#nama_anak_detail').val(data.nama_anak)
                        $('#tanggal_lahir_detail').val(data.tanggal_lahir)
                        $('#anak_ke_detail').val(data.anak_ke)
                        $('#alamat_detail').val(data.alamat)
                        $('#jenis_kelamin_detail').val(data.jenis_kelamin);
                    }
                })
            })

            $('.btn_delete').click(function() {

                var idAnak = $(this).attr('idAnak');
                $('#deleteEmployeeModal input[name="id_anak"]').val(idAnak);

                $('.final_btn').off('click').on('click', function() {
                    // console.log(idAnak);
                    $.ajax({
                        type: 'DELETE',
                        url: '/dataanak/hapus',
                        data: {
                            id_anak: idAnak,
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
