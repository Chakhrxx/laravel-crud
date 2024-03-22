<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;


class CompanyCRUDController extends Controller
{
    // Create index
    public function index()
    {
        $companies = Company::orderby('id', 'desc')->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }


    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);


        return redirect()->route('companies.index')->with([
            'message' => 'Company has been created successfully',
            'method' => 'POST',
        ]);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $company = Company::findOrFail($id);
        $company->update($validatedData);

        return redirect()->route('companies.index')->with([
            'message' => 'Company has been updated successfully',
            'method' => 'PUT',
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with([
            'message' => 'Company has been deleted successfully!',
            'method' => 'DEL',
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $companies = Company::where('name', 'LIKE', "$query%")->paginate(10);


        return view('companies.index', ['companies' => $companies]);
    }
}
