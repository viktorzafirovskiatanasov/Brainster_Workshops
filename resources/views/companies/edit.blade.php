@extends('layouts.app')

@section('title', 'CRM - Edit Company')

@section('content')
<form method="POST" action="{{route('companies.update', $company->id)}}">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$company->id}}">
    <div class="form-group my-4">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
            @error('name')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{$company->email}}">
            @error('email')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="logo" name="logo" value="{{$company->logo}}">
            @error('logo')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="website" name="website" value="{{$company->website}}">
            @error('website')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
       <legend for="country" class="col-form-label col-sm-2">Country</legend>
       <div class="col-sm-10">
        <select name="country_id" id="country_id" class="form-control">
            <option selected disabled>Select a country...</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}" {{ ($company->country_id == $country->id ? 'selected' : '')}}>{{$country->name}}</option>
            @endforeach
        </select>
        @error('country_id')
                <span class='text-danger'>{{$message}}</span>
        @enderror
       </div>
    </div>
    <button type="submit" class="btn btn-primary mt-5">Update</button>
</form>
@endsection