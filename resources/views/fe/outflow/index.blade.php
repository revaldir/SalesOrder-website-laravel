@extends('layouts.user')

@section('title', 'Outflow')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Outflow</li>
    </ol>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a href="#list-all" class="list-group-item list-group-item-action active" id="list-all-list" data-toggle="list" role="tab" aria-controls="all">All Outflows</a>
                        <a href="#list-mine" class="list-group-item list-group-item-action" id="list-mine-list" data-toggle="list" role="tab" aria-controls="mine">Submitted by Me</a>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('user.outflows.create') }}" class="btn btn-block btn-success">
                            Create New
                            <span><i class="icon-plus"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="nav-tabContent">
                    @include('flash::message')
                    <div class="tab-pane fade show active" id="list-all" role="tabpanel" aria-labelledby="list-all-list">
                        <div class="card">
                            <div class="card-header text-center text-white" style="background: #0D276B">
                                <h5 class="card-title">Outflows Table</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" cellspacing="0" id="DataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SO ID</th>
                                                <th>Proyek</th>
                                                <th>Name</th>
                                                <th>Month</th>
                                                <th>Price (Rp.)</th>
                                                <th>Submitter</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-mine" role="tabpanel" aria-labelledby="list-mine-list">
                        <div class="card">
                            <div class="card-header text-center text-white" style="background: #0D276B">
                                <h5 class="card-title">Outflows Table</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" cellspacing="0" id="DataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SO ID</th>
                                                <th>Proyek</th>
                                                <th>Name</th>
                                                <th>Month</th>
                                                <th>Price (Rp.)</th>
                                                <th>Submitter</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($outflows as $outflow)
                                            @if($outflow->submitter == Auth::user()->name)
                                            <tr>
                                                <td>{{ $outflow->id }}</td>
                                                <td>{{ $outflow->proyek }}</td>
                                                <td>{{ $outflow->category->name }}</td>
                                                <td>{{ $outflow->month->month }}</td>
                                                <td>{{ number_format($outflow->out_value,2,',','.') }}</td>
                                                <td>{{ $outflow->submitter }}</td>
                                                <td>
                                                    <a href="{{ route('user.outflows.show', $outflow->id) }}" class="btn btn-sm btn-outline-dark"><i class="cil-chevron-right"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="7">No data available.</td>
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
    </div>
</main>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $("#DataTable").DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'asc']],
            language: {
                searchPlaceholder: "ID/Proyek/Nominal/Submitter",
            },
            ajax: "{{ route('user.outflows.dt') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'proyek', name: 'proyek'},
                    {data: 'categories', name: 'categories'},
                    {data: 'months', name: 'months'},
                    {data: 'out_value', name: 'out_value'},
                    {data: 'submitter', name: 'submitter'},
                    {data: 'action', name: 'action', orderable: false, earchable: false},
                ]
        });
    setTimeout(function() {
    $('.alert').fadeOut('fast');
    }, 3000);
    });
</script>
@endsection
