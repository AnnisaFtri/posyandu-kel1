@extends('layout.app')

@section('title', 'Log Activity')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 100px; height:50px;">
                <a href="http://127.0.0.1:8000/dashboard" class="nav-link">Kembali</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hover DataTable">
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
<script>
    $(document).ready(function() {
        $('.DataTable').DataTable();
    });
</script>
@endsection
