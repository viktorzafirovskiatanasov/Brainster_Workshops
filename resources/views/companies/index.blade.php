@extends('layouts.app')

@section('title', 'CRM - Companies Home')

@section('menu-links')
<li class="nav-item">
    <a class="nav-link" href="{{route('companies.create')}}">Create Company</a>
</li>
@endsection

@section('search-form')
<form method="GET" action="{{route('companies.index')}}">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('content')
<div class="row">
    @if (session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif
    <div class="col">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->logo}}</td>
                    <td>{{$company->website}}</td>
                    <td>{{$company->country}}</td>
                    <td class="d-flex align-items-center">
                        <a href="{{route('employees.index', $company->id)}}" class="btn btn-sm btn-success">Manage employees</a>
                        <a href="{{route('companies.edit', $company->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{route('companies.destroy', $company->id)}}">
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