<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Type;
use App\Tables\CompaniesTable;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $table = (new CompaniesTable())->setup();

        return view('layouts.index',compact('table'));
    }
    public function create(){
        $types = Type::all();
        return view('companies.create',compact('types'));
    }
    public function save(CompanyRequest $request){
        $company = Company::create($request->all());

        return redirect()->back()->with('success','Company created successfully');
    }
    public function edit($id){
        $company = Company::where('id',$id)->first();
        $types = Type::all();
        return view('companies.edit',compact('company','types'));

    }
    public function update(CompanyRequest $request){
        $company = Company::where('id',$request->id)->first();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->telephone = $request->telephone;
        $company->type_id = $request->type_id;
        $company->save();
        return redirect()->back()->with('success','Company edited successfully');
    }
    public function delete($id){
        $company = Company::where('id',$id)->first();
        $company->delete();
        return redirect()->back()->with('success','Company deleted successfully');
    }
    public function view($id){
        $company = Company::where('id',$id)->first();
        return view('companies.view',compact('company'));
    }
}
