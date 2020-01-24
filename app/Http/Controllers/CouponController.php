<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use App\Coupon;
use App\Attachment;
use Auth;
use File;
use Redirect;

class CouponController extends Controller
{
    public function index(Request $request){
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }
    
    
    
    public function store(CouponRequest $request)
    {
        
        // upload/coupons
        $folder = 'coupons';
        $attachment_id = addFile($request, $folder);
        
//        dd($request->all());
        $request['attachment_id'] = $attachment_id;
        $res = Coupon::create($request->all());
        

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
            $coupon = Coupon::findOrFail($id);
            return view('admin.coupon.edit', compact('coupon'));
        } else {
            return back();
        }
    }
    
    
    
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        
        if(is_object($coupon)){
            $folder = 'coupons';
            editFile($request, $folder, $coupon);

            $res = $coupon->fill($request->all())->save();
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
        
        $coupon = Coupon::find($id);
        $res = $coupon->delete();
        
        deleteFile($coupon);
        
        if($res == true){
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
}
