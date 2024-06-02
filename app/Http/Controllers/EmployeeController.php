<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company, Request $request)
    {   
        $this->checkAuth();
        $search = $request->search;
        if($request->has('search')){
            $employees = Employee::where('company_id', $company->id)->where(function($query) use ($search){
                $query->where('name', 'LIKE', '%' .$search . '%')
                ->orWhere('surname', 'LIKE', '%' .$search . '%')
                ->orWhere('email', 'LIKE', '%' .$search . '%');
            })->get();
        } else {
             $employees = Employee::where('company_id', $company->id)->get();
        }
        // dd( $employees);
        return view('employees.index', compact('company', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        $this->checkAuth();
        return view('employees.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Company $company, EmployeeRequest $request, Employee $employee)
    {
        //
        $this->checkAuth();
        $employeeData = $request->validated();
        $employeeData['company_id'] = $company->id;
        $employeeData['created_at'] = now();
        // dd($employeeData);
        Employee::create($employeeData);
        return redirect()->route('employees.index', $company->id)->with('message', 'Employee added!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Employee $employee)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company, Employee $employee)
    {
        $this->checkAuth();
        $companies = Company::all();
        return view('employees.edit', compact('companies', 'company', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Company $company, Employee $employee)
    {
        $this->checkAuth();
        $employeeData = $request->validated();
        $employeeData['company_id'] = $request->input('company_id');
        $employeeData['updated_at'] = now();
        // dd($employeeData);
        $employee->update($employeeData);
        return redirect()->route('employees.index', $company->id)->with('message', 'Employee successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Employee $employee)
    {
        $this->checkAuth();
        $employee->delete();
        return redirect()->route('employees.index', $company->id)->with('message', 'Employee successfully deleted.');
    }

    private function checkAuth(){
        if(!session()->has('admin_id')){
            return redirect()->route('auth.index')->send();
        }
    }
}
