@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value='admin@brainster.com'>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @error('email')
                <p class="bg-danger text-white">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value='password'>
                @error('password')
                <p class="bg-danger text-white">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-brainster">Submit</button>
        </form>
        <hr />
        <div class="alert alert-secondary">
            <b>Login info</b><br />
            email: admin@brainster.com<br />
            password: password
        </div>
    </div>
</div>
@endsection