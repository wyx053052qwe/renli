<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $primaryKey = "u_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
    public  function acc()
    {
        return $this->hasMany(Accumulation::class, 'u_id', 'u_id');
    }
}
