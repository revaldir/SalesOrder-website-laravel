<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <label for="month">Select Month</label>
    <div class="input-group">
        {!! Form::selectMonth('month', null, ['placeholder' => 'Select Month', 'class' => $errors->has('month') ? 'form-control is-invalid custom-select' : 'form-control custom-select', 'required', 'autofocus']) !!}
        @if ($errors->has('month'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('month') }}</strong>
        </span>
        @endif
        <div class="input-group-append">
            <button class="btn btn-outline-success">Create</button>
        </div>
    </div>
</form>
