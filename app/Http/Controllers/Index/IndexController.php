<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Personnel;
use App\Model\Shop;

class IndexController extends Controller
{
    public function index()
    {
        $data = Shop::where('type', 1)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        $gong = Shop::where('type', 2)->orderBy('created_at', 'desc')->first();
         $gnian = json_decode($gong['nian']);
                $gban = json_decode($gong['ban']);
                $gji = json_decode($gong['ji']);
                $gyue = json_decode($gong['yue']);
        return view('app.index', [
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
            'gnian'=>$gnian,
            'gban'=>$gban,
            'gji'=>$gji,
            'gyue'=>$gyue
        ]);
    }
    public function shebao()
    {
        $data = Shop::where('type', 1)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        return view('index.shebao', [
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
        ]);
    }
    public function gongjijin()
    {
        $data = Shop::where('type', 2)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        return view('index.gongjijin', [
            'gnian' => $nian,
            'gban' => $ban,
            'gji' => $ji,
            'gyue' => $yue,
        ]);
    }
    public function login()
    {
        return view('app.login');
    }
    public function dologin()
    {
        $data = request()->post();
        $phone = $data['tel'];
        $name = $data['pwd'];
        $user = Personnel::where(['u_name' => $name, 'u_phone' => $phone])->first();
        if (empty($user)) {
            return json_encode(['code' => 1, 'message' => "没有信息，请联系管理员添加"]);
        }

        session(['u_id' => $user['u_id'],'name'=>$user['u_name']]);
        return json_encode(['code' => 2, 'message' => "登陆成功"]);
    }
}
