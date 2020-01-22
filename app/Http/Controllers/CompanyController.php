<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Company;
use Redirect;

class CompanyController extends Controller
{
    public function index(Request $request){
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }
    
    
    
    public function store(CompanyRequest $request)
    {
//        dd($request->all());
        $res = Company::create($request->all());
        
        if(is_object($res)){
            return redirect()->back()->with('success', 'تمت الاضافه بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
        
    }
    
    
    public function edit(Request $request, $id)
    {
        if ($request->ajax()){
            $company = Company::findOrFail($id);
            return view('admin.company.edit', compact('company'));
        } else {
            return back();
        }
    }
    
    
    
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $res = $company->fill($request->all())->save();

        if($res == true){
            return redirect()->back()->with('success', 'تم تعديل العضو بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function destroy($id){
        
        $company = Company::find($id);
        $res = $company->delete();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
