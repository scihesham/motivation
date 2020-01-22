<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\EditUserRequest;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;


class UserController extends Controller
{
    public function index(Request $request){
        $admin = false;
        if(isset($request->user) &&  ($request->user == 'manager') ){
                $admin = true;
                $users = User::where('permission', '0')->get();
        }
        
        else{
           $users = User::where('permission', '1')->get(); 
        }
        return view('admin.user.index', compact('users', 'admin'));
    }
    
    
    
    public function store(AddUserRequestAdmin $request)
    {
//        dd($request->all());
        $res = User::create($request->all());
        
        if(is_object($res)){
            return redirect()->back()->with('success', 'تمت اضافه العضو بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
        
    }
    
    
    public function edit(Request $request, $id)
    {
        if ($request->ajax()){
            $user = User::findOrFail($id);
            return view('admin.user.edit', compact('user'));
        } else {
            return back();
        }
    }
    
    
    
    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
        $res = $user->fill($request->except(['password', 'password_confirmation']))->save();
        if(!empty($request['password'])){
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
        }

        if($res == true){
            return redirect()->back()->with('success', 'تم تعديل العضو بنجاح');
        }
        else{
           return redirect()->back()->with('error', 'Something Went Wrong'); 
        }
    }
    
    
    public function destroy($id){
        
        $user = new User;
        $res = $user->find($id)->delete();
        
        if($res == true){
            return redirect()->back()->with('success', 'تم حذف العضو بنجاح');
        }
        else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
        
    }
    
    
    
}
