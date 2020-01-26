<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;
use Hash;

class UserController extends Controller
{
    
    public $successStatus = 200;
    
    
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')->accessToken;
                return response()->json($success);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    
        
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'integer'],
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['permission'] = 1;
        $user = User::create($input);
        
        $user->code = 'user'. $user->id;
        $user->save();
            
        $success['token'] =  $user->createToken('MyApp')->accessToken;

        return response()->json($success);
    }
    

    public function details()
    {
        $user = Auth::user();
        $user['permission_title'] = permissions()[$user->permission];
        $user['city_title'] = ksaCities()[$user->city];
        $user['stage'] = $user->stage();
        return response()->json($user);
    }
    
    
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id),],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'integer'],
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $user = Auth::user();
        $res = $user->fill($request->except(['password', 'password_confirmation', 'permission']))->save();
        if(!empty($request['password'])){
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
        }

        if($res == true){
            return response()->json(['success', 'تم تعديل العضو بنجاح']);
        }
        else{
           return response()->json(['error', 'Something Went Wrong']); 
        }
    }
    
    
    
}
