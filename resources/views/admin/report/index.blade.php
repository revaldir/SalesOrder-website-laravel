@extends('layouts.admin')

@section('title', 'Report')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Report</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background: #0D276B">
                            <h4 class="card-title">Monthly Reports</h4>
                        </div>
                        <div class="card-body">
                            @include('flash::message')

                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Budget</th>
                                            <th>Outflow</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($months as $month)
                                        <tr>
                                            <td><a href="{{ route('reports.show', $month->id) }}">{{ $month->month }}</a></td>
                                            @if($month->budget != NULL)
                                            <td>Rp {{ number_format($month->budget,0,',','.') }}</td>
                                            @else
                                            <td class="text-muted">No data available.</td>
                                            @endif
                                            @if($month->outflow != NULL)
                                            <td>Rp {{ number_format($month->outflow,0,',','.') }}</td>
                                            @else
                                            <td class="text-muted">No data available.</td>
                                            @endif
                                            @if ($month->balance < 0)
                                            <td style="color: red;">Rp {{ number_format($month->balance,0,',','.') }}</td>
                                            @elseif ($month->balance > 0)
                                            <td style="color: green;">Rp {{ number_format($month->balance,0,',','.') }}</td>
                                            @else
                                            {{-- <td>Rp {{ number_format($month->balance,0,',','.') }}</td> --}}
                                            <td class="text-muted">No data available.</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-white text-center" style="background: #0D276B">
                            <h4 class="card-title">Action</h4>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('reports.create') }}" class="btn btn-block btn-outline-primary">
                                Create/Update Report
                                <span><i class="btn-label icon-plus"></i></span>
                            </a>
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
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
