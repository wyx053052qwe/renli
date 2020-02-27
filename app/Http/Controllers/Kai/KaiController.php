<?php

namespace App\Http\Controllers\Kai;

use App\Model\Kai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KaiController extends Controller
{
    public function index()
    {
        $name = request()->input('name');
        $id_cart = request()->input('id_cart');
        $where = [];
        if(!empty($name)){
            $where[] = ['k_name','=',$name];
        }
        if(!empty($id_cart)){
            $where[] = ['k_id_cart','=',$id_cart];
        }
        $data = Kai::where($where)->paginate(10);
        return view('kai.index',[
            'data'=>$data,
            'name'=>$name,
            'id_cart'=>$id_cart
        ]);
    }

    public function add()
    {
        return view('kai.add');
    }

    public function upload()
    {
        $data = request()->input();
        $arrss = [];
        foreach($data as $k=>$v){
            $num = count($v);
            for($i=1;$i<$num;$i++){
                $arrss[$i] = $v[$i];
            }
        }
        $kai = [];
        foreach ($arrss as $k=>$v) {
            if($v['k_hun']=="未婚"){
                $v['k_hun'] = 1;
            }else if($v['k_hun']=="已婚"){
                $v['k_hun'] = 2;
            }else if($v['k_hun']=="离婚"){
                $v['k_hun'] = 3;
            }else{
                $v['k_hun'] = 0;
            }
            if($v['k_xl']=="初中"){
                $v['k_xl'] = 1;
            }else if($v['k_xl']=="中专"){
                $v['k_xl'] = 2;
            }else if($v['k_xl']=="高中"){
                $v['k_xl'] = 3;
            }else if($v['k_xl']=="大专"){
                $v['k_xl'] = 4;
            }else if($v['k_xl']=="本科"){
                $v['k_xl'] = 5;
            }else{
                $v['k_xl'] = 0;
            }
            if($v['status']==' '){
                $v['status'] = 1;
            }else if($v['status']=="已开户"){
                $v['status'] = 2;
            }else if($v['status']=="未开户"){
                $v['status'] = 1;
            }
            $count = Kai::where('k_id_cart',$v['k_id_cart'])->first();
            if($count){
                return json_encode(['code'=>3,'message'=>"数据重复$count->k_name,身份证号为：$count->k_id_cart"]);
            }
            $kai[$k]=$v;
       }
        $res = Kai::insert($kai);
        if($res){
            return json_encode(['code'=>2,'message'=>"导入成功"]);
        }else{
            return json_encode(['code'=>1,'message'=>"导入失败"]);
        }
    }
    //删除
    public function delete()
    {
        $k_id = request()->input('k_id');
        $res = Kai::where('k_id',$k_id)->delete();
        if(!$res){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
    public function dels()
    {
        $k_id = request()->input('k_id');
        $k_id = explode(',',trim($k_id,','));
        $res = Kai::whereIN('k_id',$k_id)->delete();
        if($res){
            return json_encode(['code'=>2,'message'=>'删除成功']);
        }else{
            return json_encode(['code'=>1,'message'=>'删除失败']);
        }
    }
    //导出
    public function export()
    {
        $k_id = request()->input('k_id');
        $k_id = explode(',',trim($k_id,','));
        $data = Kai::whereIN('k_id',$k_id)->get()->toArray();
        foreach($data as $k=>$v){

            if($v['k_hun'] == 1){
                $v['k_hun'] = "未婚";
            }else if($v['k_hun'] == 3){
                $v['k_hun'] ="离婚";
            }else if($v['k_hun'] == 2){
                $v['k_hun'] ="已婚";
            }else{
                $v['k_hun'] =" ";
            }
            if($v['k_xl'] == 1){
                $v['k_xl'] ="初中";
            }elseif($v['k_xl'] == 2){
                $v['k_xl'] = "中专";
            }elseif($v['k_xl'] == 3){
                $v['k_xl'] = "高中";
            }elseif($v['k_xl'] == 4){
                $v['k_xl'] = "大专";
            }elseif($v['k_xl'] == 5){
                $v['k_xl'] = "本科";
            }else{
                $v['k_xl'] = " ";
            }
            if($v['status']==1){
                $v['status'] = "未开户";
            }else if($v['status']==2){
                $v['status'] = "已开户";
            }
            $data[$k]=$v;
        }

        return json_encode(['data'=>$data]);
    }
}
