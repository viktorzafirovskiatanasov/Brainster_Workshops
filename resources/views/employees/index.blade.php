@extends('layouts.app')

@section('title', 'CRM - Companies Home')

@section('menu-links')
<li class="nav-item">
    <a class="nav-link" href="{{route('companies.create')}}">Create Company</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('employees.create', $company->id)}}">Add Employee</a>
</li>
@endsection

@section('search-form')
<form method="GET" action="{{route('employees.index', $company->id)}}">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('content')
<div class="row">
    @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    <h2>Employees of <b>{{$company->name}}</b></h2>
    <div class="col">
        <table class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td class="d-flex align-items-center">
                        <a href="{{route('employees.edit', [$company->id, $employee->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{route('employees.destroy', [$company->id, $employee->id])}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection