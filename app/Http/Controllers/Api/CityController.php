<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index(){
        $cities = ksaCities();
        $res = [];
        
        foreach($cities as $key => $city){
            $res[] = ['id' => $key,  'name' => $city];
        }
        return response()->json($res);
    }
}
