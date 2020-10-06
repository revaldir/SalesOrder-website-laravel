@extends('layouts.admin')

@section('title', 'Outflow')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }} ">Home</a>
        </li>
        <li class="breadcrumb-item active">Outflow</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white d-flex justify-content-between" style="background: #0D276B">
                            <h4 class="card-title">Outflow Table</h4>
                            <a href="{{ route('outflows.create') }}" class="btn btn-lg btn-primary"><i class="icon-plus"></i></a>
                        </div>

                        <div class="card-body">
                            @include('flash::message')

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%"
                                    cellspacing="0">
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
                                        {{-- @foreach($outflows as $of)
                                        <tr>
                                            <td> {{ $of->id }} </td>
                                            <td> {{ $of->proyek }}</td>
                                            <td> {{ $of->category->name }}</td>
                                            <td> {{ $of->month->month }}</td>
                                            <td> {{ number_format($of->out_value,2,",",".") }}</td>
                                            <td> {{ $of->submitter.' at '.$of->created_at }}</td>
                                            <td>
                                                <a href="{{ route('outflows.show', $of->id) }}" class="btn btn-sm btn-success">
                                                    <span class="label"><i class="cil-search"></i></span>
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
    $(document).ready(function() {
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'asc']],
            language: {
                searchPlaceholder: "ID/Proyek/Nominal/Submitter"
            },
            ajax: "{{ route('outflows.dt') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'proyek', name: 'proyek'},
                    {data: 'categories', name: 'categories', orderable: false, searchable: false},
                    {data: 'months', name: 'months', orderable: false, searchable: false},
                    {data: 'out_value', name: 'out_value'},
                    {data: 'submitter', name: 'submitter'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });

    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
