<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Yue extends Model
{
    protected $table = 'yue';
    protected $primaryKey = "y_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
}
