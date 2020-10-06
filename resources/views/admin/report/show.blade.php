@extends('layouts.admin')

@section('title', $month->month . ' Details')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home.admin') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('reports.index') }}">Report</a>
        </li>
        <li class="breadcrumb-item active">{{ $month->month }}</li>
    </ol>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-1">
                <div class="card">
                    <a href="{{ route('reports.index') }}" class="btn btn-lg btn-block btn-outline-light" style="background: #0D276B"><span><i class="fa fa-chevron-left"></i></span></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center text-white" style="background: #0D276B">
                        <h4 class="card-title">{{ $month->month }}</h4>
                    </div>
                    @include('flash::message')
                    <div class="card-body row container-fluid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="callout callout-info">
                                        <small class="text-muted">Total Budget</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($month->budget,2,',','.') }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="callout callout-warning">
                                        <small class="text-muted">Total Outflow</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($month->outflow,2,',','.') }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($month->balance >= 0)
                                    <div class="callout callout-success">
                                    @elseif($month->balance < 0)
                                    <div class="callout callout-danger">
                                    @endif
                                        <small class="text-muted">Balance</small>
                                        <br>
                                        <strong class="h4">Rp {{ number_format($month->balance,2,',','.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Outflow</th>
                                    <th>Balance</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reports as $rep)
                                <tr>
                                    <td>{{ $rep->category->name }}</td>
                                    <td>Rp {{ number_format($rep->budget,0,',','.') }}</td>
                                    <td>Rp {{ number_format($rep->outflow,0,',','.') }}</td>
                                    @if($rep->budget - $rep->outflow < 0)
                                    <td style="color: red;">Rp {{ number_format($rep->budget - $rep->outflow,0,',','.') }}</td>
                                    @else
                                    <td>Rp {{ number_format($rep->budget - $rep->outflow,0,',','.') }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('show.cat', ['report' => $rep->month_id, 'category' => $rep->category_id]) }}" class="btn btn-sm btn-outline-primary">
                                            Show
                                            <span>
                                                <i class="fa fa-angle-double-right"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">No data available.</td>
                                </tr>
                                @endforelse
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
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
