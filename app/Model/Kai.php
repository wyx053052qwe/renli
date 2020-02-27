<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kai extends Model
{
    protected $table = 'kai';
    protected $primaryKey = "k_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
}
