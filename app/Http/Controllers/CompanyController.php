<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkAuth();
        // DB::table('companies')->get();
        // $companies = Company::all(); Without join
        if($request->has('search')){
            $companies = Company::where('companies.name', 'LIKE', '%'.$request->search.'%')->join('countries', 'country_id', '=', 'countries.id')->select('companies.*', 'countries.name as country')->get();
        } else {
            $companies = Company::join('countries', 'country_id', '=', 'countries.id')->select('companies.*', 'countries.name as country')->get();
        }

        

        // dd($companies);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuth();
        $countries = DB::table('countries')->get(); // We have to use Query Builder bc we don't have model for Countries
        return view('companies.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyCreateRequest $request)
    {
        $this->checkAuth();
        Company::create($request->validated());
        return redirect()->route('companies.index')->with('message', 'Company created');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Company $company)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $this->checkAuth();
        $countries = DB::table('countries')->get();
        return view('companies.edit', compact('company', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyCreateRequest $request, Company $company)
    {
        $this->checkAuth();
        $company->update($request->validated());
        return redirect()->route('companies.index')->with('message', 'Company successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->checkAuth();
        $company->delete();
        return redirect()->route('companies.index')->with('message', 'Company successfully deleted.');
    }

    private function checkAuth(){
        if(!session()->has('admin_id')){
            return redirect()->route('auth.index')->send();
        }
    }
}
