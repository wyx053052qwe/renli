<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Model\Shop;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }
    public function add()
    {
        return view('shop.add');
    }
    public function doadd()
    {
        $data = request()->post();

        $type = $data['type'];
        $nian = json_encode(['yuan' => $data['nian'][0], 'xian' => $data['nian'][1]]);
        $ban = json_encode(['yuan' => $data['ban'][0], 'xian' => $data['ban'][1]]);
        $ji = json_encode(['yuan' => $data['ji'][0], 'xian' => $data['ji'][1]]);
        $yue = json_encode(['yuan' => $data['yue'][0], 'xian' => $data['yue'][1]]);
        $data = [
            'type' => $type,
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
            'created_at' => time(),
            'updated_at' => time(),
        ];
        $res = Shop::insert($data);
        if ($res) {
            return json_encode(['code' => 2, 'message' => "添加成功"]);
        } else {
            return json_encode(['code' => 1, 'message' => "添加失败"]);
        }
    }
}
