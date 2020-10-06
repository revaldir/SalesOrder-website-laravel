@extends('layouts.user')

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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white text-center" style="background: #0D276B">
                        <h5 class="card-title">This Month</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Budget</th>
                                        <th>Outflows</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($now as $n) --}}
                                    @if($now->budget != 0 && $now->outflow != 0 && $now->balance != 0)
                                    <tr>
                                        <td>{{ $now->month }}</td>
                                        <td>Rp {{ number_format($now->budget,2,',','.') }}</td>
                                        <td>Rp {{ number_format($now->outflow,2,',','.') }}</td>
                                        <td>Rp {{ number_format($now->balance,2,',','.') }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="4" class="text-center">No data available.</td>
                                    </tr>
                                    @endif
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="#" type="button" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="For create or update report, please contact admin!" class="btn btn-block btn-success"><i class="icon-plus"></i> Create/Update Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-white text-center" style="background: #0D276B">
                        <h4 class="card-title">All Reports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Budget</th>
                                        <th>Outflows</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($months as $month)
                                    <tr>
                                        <td><a href="{{ route('user.reports.show', $month->id) }}"> {{ $month->month }} </a></td>
                                        @if($month->budget != NULL)
                                        <td>Rp {{ number_format($month->budget,2,',','.') }}</td>
                                        @else
                                        <td class="text-muted">No data.</td>
                                        @endif
                                        @if($month->outflow != NULL)
                                        <td>Rp {{ number_format($month->outflow,2,',','.') }}</td>
                                        @else
                                        <td class="text-muted">No data.</td>
                                        @endif
                                        @if($month->balance < 0)
                                        <td style="color: red;">Rp {{ number_format($month->balance,2,',','.') }}</td>
                                        @elseif($month->balance > 0)
                                        <td style="color: green;">Rp {{ number_format($month->balance,2,',','.') }}</td>
                                        @else
                                        <td class="text-muted">No data.</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
    $('.popover-dismiss').popover({
        trigger: 'focus'
    })
</script>
@endsection
