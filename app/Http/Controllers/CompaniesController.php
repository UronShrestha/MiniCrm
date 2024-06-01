<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use app\Models\Employees;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagedCompanies = Companies::paginate(5);

    
        return view('Companies/HomeCompanies', compact('pagedCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            return view('Companies/addcompanies');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'logo' => 'required|mimes:jpg,jpeg,png|max:2048',
        'website' => 'required|url',
       
    ]);

    $file = $request->file('logo');
    $path = $file->store('images', 'public');

    $company = new Companies();
    $company->name = $request->name;
    $company->email = $request->email;
    $company->logo = $path;
    $company->website = $request->website;

    $company->save();

    return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
        $companies=Companies::findorFail($id);
        return view('Companies.update','companies');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $companies=Companies::findorFail($id);
        if($request->hasFile('logo')){

        
        $file=$request->file('logo');
        $path=$request->logo->store('images','public');
         $companies->logo=$path;

        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'logo' => 'sometimes|mimes:jpg,jpeg,png|max:2048',
            'website'=>'required',
        ]);
        $companies->name = $request->name;

        $companies->email=$request->email;
       
        $companies->website=$request->website;
        $companies->save();
        return redirect()->route('companies.index')->with('success','Company has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $companies=Companies::findorFail($id);
        $companies->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully.');
    }
}
