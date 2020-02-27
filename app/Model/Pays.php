<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pay';
    protected $primaryKey = "pa_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
}
