@extends('layouts.admin')

@section('title', 'Dashboard - Data SO')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        @include('flash::message')
        <div class="animated fadeIn">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white" style="background: #0D276B">
                            <h4 class="card-title">So Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="callout callout-info">
                                        <small class="text-muted">Total Budget</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($budget,2,',','.') }}</strong>
                                        <div class="progress progress-xs my-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="callout callout-warning">
                                        <small class="text-muted">Total Outflow</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($outflow,2,',','.') }}</strong>
                                        <div class="progress progress-xs my-2">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($budget-$outflow >= 0)
                                    <div class="callout callout-success">
                                    @elseif($budget-$outflow < 0)
                                    <div class="callout callout-danger">
                                    @endif
                                        <small class="text-muted">Balance</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($budget-$outflow,2,',','.') }}</strong>
                                        <div class="progress progress-xs my-2">
                                            @if($budget-$outflow >= 0)
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            @elseif($budget-$outflow < 0)
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Budget
                                <a href="{{ route('budgets.index') }}" class="badge badge-dark badge-pill">{{ $b }}</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Outflow
                                <a href="{{ route('outflows.index') }}" class="badge badge-dark badge-pill">{{ $o }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-white" style="background: #0D276B">
                            <h5 class="card-title">Pending Users</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                <form action="{{ route('home.approve', $user->id) }}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="icon-check"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');"><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No pending users.</td>
                                        </tr>
                                        @endforelse
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
    $(document).ready( function() {
        $('#dataTable').DataTable();
    });
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
