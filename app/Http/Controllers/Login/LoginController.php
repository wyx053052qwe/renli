<?php

namespace App\Http\Controllers\Login;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Login;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function dologin()
    {
        $data = request()->input();
//        dd($data);
        $user = $data['username'];
        $pwd = $data['password'];
        $pwd = md5($pwd);
        $count =Login::where('l_username',$user)->where('l_pwd',$pwd)->count();
        if(!$count){
            return json_encode(['code'=>1,'message'=>"用户名或密码错误，请重新输入"]);
        }

        session(['user'=>$user]);
        return json_encode(['code'=>2,'message'=>'登录成功']);
    }
}
