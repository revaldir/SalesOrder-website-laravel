@extends('layouts.admin')

@section('title', 'Budget')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Budget</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white d-flex justify-content-between" style="background: #0D276B">
                            <h4 class="card-title">Budget Table</h4>
                            <a href="{{ route('budgets.create') }}" class="btn btn-lg btn-primary"><i class="icon-plus"></i></a>
                        </div>
                        {{-- <div class="card-header text-white">
                            <a href="{{ route('budgets.create') }}" class="btn btn-sm btn-primary" style="">Add New</a>
                        </div> --}}

                        <div class="card-body">
                            @include('flash::message')

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Month</th>
                                            <th>Name</th>
                                            <th>Price (Rp.)</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach($budgets as $nm)
                                        <tr>
                                            <td> {{ $nm->id }} </td>
                                            <td> {{ $nm->month->month }}</td>
                                            <td> {{ $nm->category->name }}</td>
                                            <td> {{ number_format($nm->value,2,",",".") }}</td>
                                            <td> {{ date("H:i:s, j/M/Y", strtotime($nm->created_at)) }}</td>
                                            <td>
                                                <form action="/admin/budgets/{{ $nm->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('budgets.edit', $nm->id) }}" class="btn btn-sm btn-outline-warning" style="padding-bottom: 0px; padding-top: 0px;">
                                                        Edit
                                                        <span class="btn-label btn-label-right"><i class="fa fa-edit"></i></span>
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" style="padding-bottom: 0px; padding-top: 0px;"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        Delete
                                                        <span class="btn-label btn-label-right"><i class="fa fa-trash"></i></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                        {{-- @foreach($budgets as $budget)
                                        <tr>
                                            <td>{{ $budget->category_id }}</td>
                                            <td>{{ date("F",$budget->bulan) }}</td>
                                            <td>Rp {{ number_format($budget->value) }}</td>
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
                searchPlaceholder: "ID/Nominal"
            },
            ajax: "{{ route('budgets.dt') }}",
                columns: [
                {data: 'id', name: 'id'},
                {data: 'months', name: 'months', orderable: false, searchable: false},
                {data: 'categories', name: 'categories', orderable: false, searchable: false},
                {data: 'value', name: 'value'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
        });
    });

    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
