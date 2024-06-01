<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pagedEmployees = Employees::with('companies')->orderBy('id')->paginate(5);
       
    
        return view('Employees/HomeEmployees', compact('pagedEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Companies::all();
        return view("Employees/addemployees",compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
            ]);
            Employees::create($request->all());
            return redirect()->route('employees.index')->with('success','Employee added successfully');


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
        $employees = Employees::findorFail($id);
        $companies = Companies::all();
    
        $selectedCompanies = $employees->companies->pluck('id');
        return view("employees.update",compact("companies","employees","selectedCompanies"));

        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employees = Employees::find($id);
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
            ]);
            
            
            $employees->update($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employees = Employees::find($id);
        $employees->delete();
            return redirect()->route('employees.index');
            

    }
}
