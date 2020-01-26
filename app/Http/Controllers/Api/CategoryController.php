<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    
    public function index(){
        $cats = Category::orderBy('ordering', 'desc')->get(); 
        return response()->json($cats);
    }
    
}
