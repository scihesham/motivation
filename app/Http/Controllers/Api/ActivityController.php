<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;

class ActivityController extends Controller
{
    public function index(){
        $acts = Activity::orderBy('ordering', 'desc')->get(); 
        return response()->json($acts);
    }
}
