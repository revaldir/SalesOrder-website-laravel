@extends('layouts.admin')

@section('title', 'Category Details')

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary"><i class="fa fa-long-arrow-left"></i></a>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Outflow</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($report as $rep)
                                    <tr>
                                        <td>{{ $rep->category->name }}</td>
                                        <td>Rp {{ number_format($rep->budget,0,',','.') }}</td>
                                        <td>Rp {{ number_format($rep->outflow,0,',','.') }}</td>
                                        @if($rep->budget - $rep->outflow < 0)
                                        <td style="color: red;">Rp {{ number_format($rep->budget - $rep->outflow,0,',','.') }}</td>
                                        @else
                                        <td>Rp {{ number_format($rep->budget - $rep->outflow,0,',','.') }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <h5 class="card-title text-center">History</h5><br>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-hover table-sm">
                            <thead>
                                <tr>
                                    <th colspan="3">Budget</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($budgets as $budget)
                                    <tr>
                                        <td>{{ $budget->id }}</td>
                                        <td>Rp {{ number_format($budget->value,2,',','.') }}</td>
                                        <td>{{ date('H:i d/m/y', strtotime($budget->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-muted text-center">No data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless table-hover table-sm">
                            <thead>
                                <tr>
                                    <th colspan="5">Outflow</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($outflows as $outflow)
                                    <tr>
                                        <td>{{ $outflow->id }}</td>
                                        <td>{{ $outflow->proyek }}</td>
                                        <td>Rp {{ number_format($outflow->out_value,2,',','.') }}</td>
                                        <td>{{ $outflow->submitter }}</td>
                                        <td>{{ date('H:i d/m/y', strtotime($outflow->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No data available.</td>
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
