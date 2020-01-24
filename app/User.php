<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'permission', 'phone', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    public function stage(){        
        $stages = Stage::orderBy('starts', 'desc')->get();
        foreach($stages as $stage){
            if($this->coins >= $stage->starts){
                 return $stage;   
            }
        }
        
        /* if missmatch => fill all columns with empty */
        $stage_obj = new Stage();
        $columns = $this->getConnection()->getSchemaBuilder()->getColumnListing('stages');
        foreach($columns as $key => $val){
            $stage_obj[$val] = '';
        }
        return $stage_obj;
    }
}
