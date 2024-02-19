@extends('layout.app')
@section('title', 'pemeriksaan')
@section('content')

<div class="container-xl" style="margin-left: 100px; width: 100%; padding:0 0px;">
    <div class="table-responsive">
        <div class="table-title">
            <div class="row">
                <div class="col-10">
                    <h2>PEMERIKSAAN <b>ANAK</b> </h2>
                    <div class="row">
                        <div class="col-sm-6 d-flex justify-content-center">
                            <!-- Menggunakan grid system Bootstrap untuk membagi kolom -->
                            <a href="#addEmployeeModal" class="btn btn-success" style="width: 150px;" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> <span>Tambah</span>
                            </a>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-center justify-content-sm-end">
                            <!-- Menggunakan grid system Bootstrap untuk membagi kolom -->
                            <!-- <a href="pemeriksaan/cetak" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            </svg> Cetak PDF
        </a> -->
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pemeriksaan</th>
                                <th>Nama</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaan as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->id_pemeriksaan }}</td>
                                <td>{{ $p->nama_anak }}</td>
                                <td>{{ $p->tanggal_pemeriksaan }}</td>
                                <td style="width: 150px; padding: 0px;display : flex">
                                    <a href="#editEmployeeModal-{{$p->id_pemeriksaan}}" class="edit btn_edit" data-toggle="modal" idPemeriksaan="{{ $p->id_pemeriksaan }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="#deleteEmployeeModal" class="delete btn_delete" data-toggle="modal" idPemeriksaan="{{ $p->id_pemeriksaan }}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    <a href="#detailEmployeeModal" class="detail btn_detail" data-toggle="modal" idPemeriksaan="{{ $p->id_pemeriksaan }}"><i class="bi bi-book" data-toggle="tooltip" title="Detail"></i></a>
                                </td>
                            </tr>

                            <!-- Edit Modal HTML -->
                            <div id="editEmployeeModal-{{$p->id_pemeriksaan}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/pemeriksaan/update" method="POST">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label>ID Pemeriksaan</label>
                                                    <input name="id_pemeriksaan" type="text" class="form-control" value="{{$p->id_pemeriksaan}}" required id="id_pemeriksaan">
                                                </div>
                                                <div class="form-group">
                                                    <label>ID Anak</label>
                                                    <input name="id_anak" type="number" class="form-control" value="{{$p->id_anak}}" required id="id_anak">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input name="nama_anak" type="text" class="form-control" value="{{$p->nama_anak}}" required id="nama_anak">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Pemeriksaan</label>
                                                    <input name="tanggal_pemeriksaan" type="date" class="form-control" value="{{$p->tanggal_pemeriksaan}}" required id="tanggal_pemeriksaan">
                                                </div>
                                                <div class="form-group">
                                                    <label>Usia</label>
                                                    <input name="usia" type="text" class="form-control" value="{{$p->usia}}" required id="usia">
                                                </div>
                                                <div class="form-group">
                                                    <label>Berat badan</label>
                                                    <input name="berat_badan" type="text" class="form-control" value="{{$p->berat_badan}}" required id="berat_badan">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tinggi badan</label>
                                                    <input name="tinggi_badan" type="text" class="form-control" value="{{$p->tinggi_badan}}" required id="tinggi_badan">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lingkar kepala</label>
                                                    <input name="lingkar_kepala" type="number" class="form-control" value="{{$p->lingkar_kepala}}" required id="lingkar_kepala">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status gizi</label>
                                                    <input name="status_gizi" type="text" class="form-control" value="{{$p->status_gizi}}" required id="status_gizi">
                                                </div>
                                                <div class="form-group">
                                                    <label>Saran</label>
                                                    <input name="saran" type="text" class="form-control" value="{{$p->saran}}" required id="saran">
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
                    <form method="post" action="{{ url('pemeriksaan', ['tambah']) }}">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pemeriksaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('pemeriksaan', ['tambah']) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="id_pemeriksaan">ID Pemeriksaan</label>
                                    <input name="id_pemeriksaan" type="number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="id_anak">ID Anak</label>
                                    <input name="id_anak" type="number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama_anak">Nama Anak</label>
                                    <input name="nama_anak" type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input name="tanggal_pemeriksaan" type="date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="usia">Usia</label>
                                    <input name="usia" type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="berat_badan">Berat Badan</label>
                                    <input name="berat_badan" type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tinggi_badan">Tinggi Badan</label>
                                    <input name="tinggi_badan" type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="lingkar_kepala">Lingkar Kepala</label>
                                    <input name="lingkar_kepala" type="number" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="status_gizi">Status Gizi</label>
                                    <input name="status_gizi" type="text" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="saran">Saran</label>
                                    <input name="saran" type="text" class="form-control" required>
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

        <!-- Detail Modal HTML -->
        <div id="detailEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/pemeriksaan/detail" method="GET">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>ID Pemeriksaan</label>
                                <input disabled="id_pemeriksaan" name="id_pemeriksaan" type="number" class="form-control" required id="id_pemeriksaan_detail">
                            </div>
                            <div class="form-group">
                                <label>ID Anak</label>
                                <input disabled="id_anak" name="id_anak" type="number" class="form-control" required id="id_anak_detail">
                            </div>
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <input disabled="disabled" name="nama_anak" type="text" class="form-control"  required id="nama_anak_detail">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pemeriksaan</label>
                                <input disabled="disabled" name="tanggal_pemeriksaan" type="text" class="form-control" required id="tanggal_pemeriksaan_detail">
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type disabled="text" name="usia" required id="usia_detail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Berat badan</label>
                                <input name disabled="berat_badan" type="text" class="form-control" required id="berat_badan_detail">
                            </div>
                            <div class="form-group">
                                <label>Tinggi badan</label>
                                <input name disabled="tinggi_badan" type="text" class="form-control" required id="tinggi_badan_detail">
                            </div>
                            <div class="form-group">
                                <label>Lingkar kepala</label>
                                <input name disabled="lingkar_kepala" type="number" class="form-control" required id="lingkar_kepala_detail">
                            </div>
                            <div class="form-group">
                                <label>Status gizi</label>
                                <input name disabled="status_gizi" type="text" class="form-control" required id="status_gizi_detail">
                            </div>
                            <div class="form-group">
                                <label>Saran</label>
                                <input name disabled="saran" type="text" class="form-control" required id="saran_detail">
                            </div>
                        </div>

                        <div class="modal-footer">
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
                        <input type="hidden" name="id_pemeriksaan">
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
                    var idPemeriksaan = $(this).attr('idPemeriksaan');
                    $.ajax({
                        type: 'POST',
                        url: '/pemeriksaan/edit',
                        data: {
                            id_pemeriksaan: idPemeriksaan,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            $('#id_pemeriksaan').val(data.id_pemeriksaan);
                            $('#id_anak').val(data.id_anak);
                            $('#nama_anak').val(data.nama_anak);
                            $('#tanggal_pemeriksaan').val(data.tanggal_pemeriksaan);
                            $('#usia').val(data.usia);
                            $('#berat_badan').val(data.berat_badan);
                            $('#tinggi_badan').val(data.tinggi_badan);
                            $('#lingkar_kepala').val(data.lingkar_kepala);
                            $('#status_gizi').val(data.status_gizi);
                            $('#saran').val(data.saran);
                        }
                    });
                });


                $('.btn_detail').click(function() {
                    var idPemeriksaan = $(this).attr('idPemeriksaan');
                    $.ajax({
                        type: 'GET',
                        url: '/pemeriksaan/detail',
                        data: {
                            id_pemeriksaan: idPemeriksaan,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#id_pemeriksaan_detail').val(data.id_pemeriksaan)
                            $('#id_anak_detail').val(data.id_anak)
                            $('#nama_anak_detail').val(data.nama_anak)
                            $('#tanggal_pemeriksaan_detail').val(data.tanggal_pemeriksaan)
                            $('#usia_detail').val(data.usia)
                            $('#berat_badan_detail').val(data.berat_badan)
                            $('#tinggi_badan_detail').val(data.tinggi_badan)
                            $('#lingkar_kepala_detail').val(data.lingkar_kepala)
                            $('#status_gizi_detail').val(data.status_gizi)
                            $('#saran_detail').val(data.saran)
                        }
                    })
                })


                $('.btn_delete').click(function() {
                    var idPemeriksaan = $(this).attr('idPemeriksaan');
                    $('#deleteEmployeeModal input[name="id_pemeriksaan"]').val(idPemeriksaan);

                    $('.final_btn').off('click').on('click', function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '/pemeriksaan/hapus',
                            data: {
                                'id_pemeriksaan': idPemeriksaan,
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    });
                });
            });
        </script>

        @endsection