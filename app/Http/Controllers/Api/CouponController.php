<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;

class CouponController extends Controller
{
    public function index(Request $request){
        $coupons = Coupon::with('company', 'stage', 'category', 'attach')->get();
        return response()->json($coupons);
    }
}
