<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stage;

class StageController extends Controller
{
    public function index(){
        $stages = Stage::orderBy('ordering', 'desc')->get(); 
        return response()->json($stages);
    }
}
