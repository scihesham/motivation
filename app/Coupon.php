<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
   protected $fillable = [
        'coupon_title', 'coupon_percentage', 'coupon_details', 'coupon_count', 'company_id', 'category_id', 'attachment_id'
   ];
    
    public function company(){
        return $this->belongsTo('App\Company', 'company_id')->withDefault();
    }
    
    public function category(){
        return $this->belongsTo('App\Category', 'category_id')->withDefault();
    }
    
    public function attach(){
        return $this->belongsTo('App\Attachment', 'attachment_id')->withDefault();
    }
    
}
