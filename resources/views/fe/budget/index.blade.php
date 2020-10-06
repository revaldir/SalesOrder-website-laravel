@extends('layouts.user')

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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center" style="background: #0D276B">
                        <h5 class="card-title">This Month</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover compact" id="dT">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($month as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->category->name }}</td>
                                    <td>Rp {{ number_format($m->value,2,',','.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">No data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="background: #0D276B">
                        <div class="accordion" id="accordion">
                            <div class="list-group">
                                <a href="#collapse" data-toggle="collapse" role="button" aria-controls="collapse" aria-expanded="false" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Budgets
                                    <span class="badge badge-success badge-pill">{{ $all }}</span>
                                </a>
                                <div class="collapse" id="collapse">
                                    <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
                                        This Month
                                        <span class="badge badge-dark badge-pill">{{ $tm }}</span>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-center" style="background: #0D276B">
                    <h4 class="card-title">All Budgets</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Kategori</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse($budgets as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $b->month->month }}</td>
                                    <td>{{ $b->category->name }}</td>
                                    <td>Rp. {{ number_format($b->value,2,',','.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No data.</td>
                                </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
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
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            searching: false,
            ajax: "{{ route('user.budgets.dt') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, earchable: false},
                    {data: 'months', name: 'months'},
                    {data: 'categories', name: 'categories'},
                    {data: 'value', name: 'value'},
                ]
        });
        $("#dT").DataTable({
            searching: false,
            ordering: false,
            bLengthChange: false
        });
    });
</script>
@endsection
