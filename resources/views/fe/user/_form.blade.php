<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label">Name</label>
    <div class="col-md-8">
        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="username" class="col-md-2 col-form-label">Username</label>
    <div class="col-md-8">
        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => $errors->has('username') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-2 col-form-label">Email</label>
    <div class="col-md-8">
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-2 col-form-label">Password</label>
    <div class="col-md-8">
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="Password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password_confirmation" class="col-md-2 col-form-label">Confirm Password</label>
    <div class="col-md-8">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Confirm Password">
    </div>
</div>
