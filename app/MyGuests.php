<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyGuests extends Model
{
    //隐式模型绑定 默认绑定的是id
    protected $fillable = [
        'firstname', 'lastname', 'email','reg_date'
    ];

    //隐式模型绑定 自定义键名
    public function getRouteKeyName(){
    	return 'firstname';
    }

    /*显式绑定*/
}
