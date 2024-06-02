@extends('layouts.app')

@section('title', 'CRM - Create New Company')

@section('content')
<form method="POST" action="{{route('employees.store', $company->id)}}">
    @csrf
    <div class="form-group my-4">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
            @error('surname')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
            @error('email')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
            @error('phone')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>
@endsection