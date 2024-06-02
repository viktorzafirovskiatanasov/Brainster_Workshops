@extends('layouts.app')

@section('title', 'CRM - Edit Company')

@section('content')
<form method="POST" action="{{route('employees.update', [$company->id, $employee->id])}}">
    @csrf
    @method('patch')
    <div class="form-group my-4">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
            @error('name')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="surname" class="col-sm-2 col-form-label">Surname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="surname" name="surname" value="{{$employee->surname}}">
            @error('surname')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{$employee->email}}">
            @error('email')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
            @error('phone')
                <span class='text-danger'>{{$message}}</span>
            @enderror
        </div>
    </div>
    <div class="form-group my-4">
        <legend for="country" class="col-form-label col-sm-2">Company</legend>
        <div class="col-sm-10">
         <select name="company_id" id="company_id" class="form-control">
             @foreach($companies as $company_select)
                 <option value="{{$company_select->id}}" {{ ($employee->company_id == $company_select->id ? 'selected' : '')}}>{{$company_select->name}}</option>
             @endforeach
         </select>
         @error('company_id')
                 <span class='text-danger'>{{$message}}</span>
         @enderror
        </div>
     </div>
    <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>
@endsection