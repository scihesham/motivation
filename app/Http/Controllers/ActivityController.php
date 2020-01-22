<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;
use App\Activity;
use Redirect;

class ActivityController extends Controller
{
     public function index(){
        $acts = Activity::orderBy('ordering', 'desc')->get(); 
        return view('admin.activity.index', compact('acts'));
    }
    
    
    public function store(ActivityRequest $request)
    {  
        
        $max_ordering = Activity::max('ordering');
        $request['ordering'] = $max_ordering + 1;
        
        $res = Activity::create($request->all());
        
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
            $act = Activity::findOrFail($id);
            return view('admin.activity.edit', compact('act'));
        } else {
            return back();
        }
    }
    
    
    public function update(ActivityRequest $request, $id){
        
        $act = Activity::find($id);
        
        if(is_object($act)){
                $res = $act->fill($request->all())->save();
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
        
        $act = Activity::find($id);
        $res = $act->delete();

        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
