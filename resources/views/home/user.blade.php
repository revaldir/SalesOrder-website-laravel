@extends('layouts.user')

@section('title', 'Home - Data SO')

@section('content')
<main class="main">
    <!-- Page Content -->
    <div class="container-fluid">
        @include('flash::message')

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><i class="cil-home"></i></h1>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-7 mb-4">
                <div class="card">
                    <div class="card-header text-white d-flex justify-content-between" style="background: #0D276B">
                        <h5 class="card-title">This Month</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="callout callout-info">
                                    <small class="text-muted">Total Budget</small>
                                    <br>
                                    <strong class="h5">Rp {{ number_format($bm,2,',','.') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="callout callout-warning">
                                    <small class="text-muted">Total Outflow</small>
                                    <br>
                                    <strong class="h5">Rp {{ number_format($om,2,',','.') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if($bm - $om >= 0)
                                <div class="callout callout-success">
                                @elseif($bm - $om < 0)
                                <div class="callout callout-danger">
                                @endif
                                    <small class="text-muted">Balance</small>
                                    <br>
                                    <strong class="h5">Rp {{ number_format($bm - $om,2,',','.') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->



    </div>
    <!-- /.container -->
</main>
@endsection

@section('js')
<script>
    setTimeout(function() {
    $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
