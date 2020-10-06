<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'name']) !!}
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="username">Username</label>
        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => $errors->has('username') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'username']) !!}
    </div>
    <div class="form-group col-md-6">
        <label for="email">E-mail Address</label>
        {!! Form::email('email', null, ['placeholder' => 'E-mail Address', 'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'email']) !!}
    </div>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password"
    @if($user->password != NULL && $user->id != Auth::user()->id)
    placeholder="Can't Change Password"
    disabled
    @else
    placeholder="Password"
    required
    @endif
    >
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password-confirm">Confirm Password</label>
    <input type="password" name="password-confirm" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" name="password-confirm" autocomplete="new-password"
    @if($user->password != NULL && $user->id != Auth::user()->id)
    placeholder="Can't Change Password"
    disabled
    @else
    placeholder="Confirm Password"
    required
    @endif
    >
    @error('password-confirm')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="role_id">Role</label>
        {!! Form::select('role_id', $option['role'], null, ['placeholder' => 'Select Role', 'class' =>
        $errors->has('role_id') ? 'form-control is-invalid' :
        'form-control', 'required', 'autofocus', 'id' => 'role_id']) !!}
        @if ($errors->has('role_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('role_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="is_active">Status</label>
        {!! Form::select('is_active', ['Inactive', 'Active'], null, ['placeholder' => 'Select Status', 'class' => $errors->has('is_active') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'is_active']) !!}
        @if ($errors->has('is_active'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('is_active') }}</strong>
        </span>
        @endif
    </div>
</div>
