<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Accumulation extends Model
{
    protected $table = 'accumulation';
    protected $primaryKey = "a_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
    public function wage()
    {
        return $this->hasMany(Wage::class, 'u_id', 'u_id');
    }
}
