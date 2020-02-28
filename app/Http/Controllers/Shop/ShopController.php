<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Model\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $data = Shop::paginate(10);
        $nian = [];
        $ban = [];
        $ji = [];
        $yue = [];
        foreach($data as $k=>$v){
            $nian[] = json_decode($v->nian);
            $ban[] = json_decode($v->ban);
            $ji[] = json_decode($v->ji);
            $yue[] = json_decode($v->yue);
        }
        return view('shop.index',[
            'data'=>$data,
            'nian'=>$nian,
            'ban'=>$ban,
            'ji'=>$ji,
            'yue'=>$yue
        ]);
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
    //删除
    public function delete()
    {
        $s_id = request()->input('s_id');
        $result = Shop::where('s_id',$s_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
    public function dels()
    {
        $s_id = request()->input('s_id');
        $s_id = explode(',',trim($s_id,','));
        $result = Shop::whereIN('s_id',$s_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
}
