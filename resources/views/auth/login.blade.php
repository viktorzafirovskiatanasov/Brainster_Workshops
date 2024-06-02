<div>
    <!-- An unexamined life is not worth living. - Socrates -->
</div>
@extends('layout.app')

@section('content')
<div class="row pt-5">
    <div class="col-6 offset-3">
        <form method='POST' action="{{route('login.index')}}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
