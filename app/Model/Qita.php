<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qita extends Model
{
    protected $table = 'qita';
    protected $primaryKey = "q_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
}
