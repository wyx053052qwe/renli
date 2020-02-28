<?php

namespace App\Http\Controllers\Yue;

use App\Model\Yue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YueController extends Controller
{
    public function index()
    {
        $data = Yue::paginate(10);
        return view('yue.index',[
            'data'=>$data
        ]);
    }
    public function upload()
    {
        $data = request()->input();
        $arr=[];
        //处理接过来的数据
        foreach($data as $k=>$v){
            $arr=$v;
        }
        $arrs = [];
        foreach($arr as $k=>$v){
            $arrs = $v;
        }
        $arrss = [];
        foreach($arrs as $k=>$v){
            $num = count($v);
            for($i=1;$i<$num;$i++){
                $arrss[$i] = $v[$i];
            }
        }
        $res = Yue::insert($arrss);
        if($res){
            return json_encode(['code'=>2,'message'=>"导入成功"]);
        }else{
            return json_encode(['code'=>1,'message'=>"导入失败"]);
        }
    }
    //导出
    public function export()
    {
        $u_id = request()->input('u_id');
        $u_id = explode(',',trim($u_id,','));
        $data = Yue::whereIN('u_id',$u_id)->get()->toArray();
        return json_encode(['data'=>$data]);
    }
    public function yue()
    {
        return view('yue.yue');
    }
    public function doyue()
    {
        $data = request()->input();
        $arr = [
            'y_zhang' => $data['y_zhang'],
            'y_name' => $data['y_name'],
            'y_id_cart' => $data['y_id_cart'],
            'y_gjcj' => $data['y_gjcj'],
            'y_gyjc' => $data['y_gyjc'],
            'y_dyjc' => $data['y_dyjc'],
            'y_yjc' => $data['y_yjc'],
            'create_time' => time(),
            'update_time' => time()
        ];
        $res = Yue::insert($arr);
        if($res){
            return json_encode(['code'=>2,'message'=>"添加成功"]);
        }else{
            return json_encode(['code'=>1,'message'=>"添加失败"]);
        }
    }
    //删除
    public function delete()
    {
        $y_id = request()->input('y_id');
        $result = Yue::where('y_id',$y_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
    public function dels()
    {
        $y_id = request()->input('y_id');
        $y_id = explode(',',trim($y_id,','));
        $result = Yue::whereIN('y_id',$y_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }

}
