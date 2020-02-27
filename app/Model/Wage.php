<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Qita;

class Wage extends Model
{
    protected $table = 'wage';
    protected $primaryKey = "w_id";
    public $timestamps = false;
    protected  $guarded = false;    //加入黑名单
    public function qita()
    {
        return $this->hasMany(Qita::class, 'u_id', 'u_id');
    }
}
