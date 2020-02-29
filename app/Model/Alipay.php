<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alipay extends Model
{
    protected $table = 'alipay';
    protected $primaryKey = "p_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
}
