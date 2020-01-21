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
        if(isset($request->user) && ( ($request->user == 'owner') || ($request->user == 'manager') )){

            if($request->user == 'owner'){
                $users = User::where('permission', '2')->get();
            }

            if($request->user == 'manager'){
                $users = User::where('permission', '0')->orWhere('permission', '1')->get();
            }
        }
        
        else{
           $users = User::where('permission', '3')->get(); 
        }
        return view('admin.user.index', compact('users'));
    }
    
    
//    public function store(Request $request){
//
//        $rules = [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
//            'permission' => ['required', 'integer',],
//        ];
//
//        $messages = [
//
//            'name.required' => 'اسم العضو مطلوب',
//            'email.required' => 'البريد الالكترونى مطلوب',
//            'password.required' => 'الرقم السري مطلوب',
//            'permission.required' => 'صلاحيه العضو مطلوبه',
//        ];
//
//        $validation = Validator::make($request->all(),$rules, $messages);
//
//        dd($request->permission);
//        
//        if ($validation->fails()){
//            return response()->json(['status' => 0, 'msg' => $validation->messages()->first()]);
//        }
//        $res = User::create($request->all());
//        if(is_object($res)){ 
//            return response()->json(['status' => 1, 'msg' => 'تم إضافة العضو بنجاح']);
//        }
//        else{
//           return response()->json(['status' => 0, 'msg' => 'هناك مشكله فى اضافه العضو']);
//        }
//        
//    }
    
    
    public function store(AddUserRequestAdmin $request)
    {
//        dd($request->all());
        $res = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => $request->permission,
        ]);
        
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
