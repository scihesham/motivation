<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StageRequest;
use App\Stage;
use Redirect;

class StageController extends Controller
{
      public function index(){
        $stages = Stage::orderBy('ordering', 'desc')->get(); 
        return view('admin.stage.index', compact('stages'));
    }
    
    
    public function store(StageRequest $request)
    {  
        
        $max_ordering = Stage::max('ordering');
        $request['ordering'] = $max_ordering + 1;
        
        $res = Stage::create($request->all());
        
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
            $stage = Stage::findOrFail($id);
            return view('admin.stage.edit', compact('stage'));
        } else {
            return back();
        }
    }
    
    
    public function update(StageRequest $request, $id){
        
        $stage = Stage::find($id);
        
        if(is_object($stage)){
                $res = $stage->fill($request->all())->save();
                if($res == true){
                    return redirect()->back()->with('success', 'تم التعديل بنجاح'); 
                }
                else{
                    return redirect()->back()->with('error', 'Something Went Wrong'); 
                }
                    
            }
            else{
               return redirect()->back()->with('error', 'Something Went Wrong'); 
            }
   }
    
    
    public function destroy($id){
        
        $stage = Stage::find($id);
        $res = $stage->delete();

        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
