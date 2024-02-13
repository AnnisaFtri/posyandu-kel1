@extends('layout.app')
@section('title', 'Log Activity')
@section('content')
    <div class="container" style="margin-left: 300px;">
        <div class="row" style="width: 100%;">
            <div class="col">
                <div class="card" style="width: 100px; height:50px;">
                    <!-- <li> -->
                    <a href="http://127.0.0.1:8000/dashboard">
                        <span class="nav-item">kembali</span>
                    </a>
                    <!-- </li> -->
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hovered DataTable">
                            <thead>
                                <tr>
                                    <th>Log ID</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Log</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->id }}</td>
                                        <td>{{ $log->username }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->log }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="module">
        $('.table').DataTable();
    </script>
@endsection
