<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use App\User;
use Hash;

class FrontController extends Controller
{

    public function index(){
        return view('front.index');
    }
    
    
    public function profile(){
        return view('front.profile.profile');
    }
     
    
    public function updateprofile(Request $request){
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id),],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ];


        $validation = Validator::make($request->all(),$rules);

        if ($validation->fails()){
            return redirect()->back()->with('error', $validation->messages()->first());
        }
        
        $user = User::find(Auth::user()->id);
        
        if(empty($request->password)){
            $res = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
            ])->save();
        }
        else{
            $res = $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->save();  
        }
        
        if($res == true){
            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
}
