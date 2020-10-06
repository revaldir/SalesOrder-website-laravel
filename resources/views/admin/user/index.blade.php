@extends('layouts.admin')

@section('title', 'User')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white" style="background: #0D276B">
                            <h4 class="card-title">User Table</h4>
                        </div>
                        <div class="card-body">
                            @include('flash::message')
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach($users as $u)
                                        <tr>
                                            <td>{{ $u->id }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>{{ $u->username }}</td>
                                            <td>{{ $u->email }}</td>
                                            <td>{{ $u->role->name }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $u->id) }}" class="badge badge-secondary" style="padding-bottom: 0px; padding-top: 0px;">
                                                    Show
                                                    <span class="btn-label btn-label-right"><i class="fa fa-eye"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            order: [[4, 'asc']],
            ajax: "{{ route('users.dt') }}",
                columns: [
                    {data: 'id', name: 'id', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'roles', name: 'roles'},
                    {data: 'action', name: 'action', orderable: false, earchable: false},
                ]
        });
    })
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
