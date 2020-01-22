<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Redirect;

class CategoryController extends Controller
{
    public function index(){
        $cats = Category::orderBy('ordering', 'desc')->get(); 
        return view('admin.category.index', compact('cats'));
    }
    
    
    public function store(CategoryRequest $request)
    {  
        
        $max_ordering = Category::max('ordering');
        $request['ordering'] = $max_ordering + 1;
        
        $res = Category::create($request->all());
        
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
            $cat = Category::findOrFail($id);
            return view('admin.category.edit', compact('cat'));
        } else {
            return back();
        }
    }
    
    
    public function update(CategoryRequest $request, $id){
        
        $cats = Category::find($id);
        
        if(is_object($cats)){
                $res = $cats->fill($request->all())->save();
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
        
        $cat = Category::find($id);
        $res = $cat->delete();

        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
