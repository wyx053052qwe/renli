<?php

namespace App\Http\Controllers\Yuan;

use App\Model\Accumulation;
use App\Model\Personnel;
use App\Model\Qita;
use App\Model\Wage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YuanController extends Controller
{
    public function index()
    {
        $name = request()->input('name');
        $gonsi = request()->input('gongsi');
        $id_cart = request()->input('id_cart');
        $where = [];
        if(!empty($name)){
            $where[] = ['u_name','=',$name];
        }
        if(!empty($gonsi)){
            $where[] = ['u_company','=',$gonsi];
        }
        if(!empty($id_cart)){
            $where[] = ['u_id_cart','=',$id_cart];
        }
        $data = Personnel::where($where)->paginate(10);
        return view('yuan.list',[
            'data'=>$data,
            'name'=>$name,
            'gongsi'=>$gonsi,
            'id_cart'=>$id_cart
        ]);
    }
    public function add()
    {
        return view('yuan.add');
    }
    public function doadd()
    {
        $data = request()->input();
        $count = Personnel::where('u_id_cart',$data['u_id_cart'])->first();
        if($count){
            return json_encode(['code'=>1,'message'=>'已有该员工的信息']);
        }
        $dataUsers = [
            'u_company' => $data['u_company'],
            'u_management' => $data['u_management'],
            'u_references' => $data['u_references'],
            'u_unit' => $data['u_unit'],
            'u_in_time' => $data['u_in_time'],
            'u_name' => $data['u_name'],
            'u_sex' => $data['u_sex'],
            'u_phone' => $data['u_phone'],
            'u_id_cart' => $data['u_id_cart'],
            'u_marriage' => $data['u_marriage'],
            'u_position' => $data['u_position'],
            'u_professional' => $data['u_professional'],
            'u_title' => $data['u_title'],
            'u_formal' => $data['u_formal'],
            'u_address' =>$data['u_address'],
            'create_time' => time(),
            'update_time' => time()
        ];
        $rse = Personnel::insert($dataUsers);
        if($rse){
            return json_encode(['code'=>2,'message'=>'添加成功']);
        }else{
            return json_encode(['code'=>3,'message'=>'添加失败']);
        }
    }
    //导入数据
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
        //处理数组中的字段 与数据库所设计的一样
        $personal = [];
        $acc = [];
        $wage = [];
        $qita = [];
        foreach($arrss as $k=>$v)
        {
            $personal[$k] = [
                'u_id' => $v['u_id'],
                'u_company' => $v['u_company'],
                'u_management' => $v['u_management'],
                'u_references' => $v['u_references'],
                'u_unit' => $v['u_unit'],
                'u_in_time' => $v['u_in_time'],
                'u_name' => $v['u_name'],
                'u_sex' => $v['u_sex'],
                'u_phone' => $v['u_phone'],
                'u_id_cart' => $v['u_id_cart'],
                'u_marriage' => $v['u_marriage'],
                'u_position' => $v['u_position'],
                'u_professional' => $v['u_professional'],
                'u_title' => $v['u_title'],
                'u_formal' => $v['u_formal'],
                'u_address' => $v['u_address'],
                'u_number' => $v['u_number'],

            ];
            if($v['u_sex'] == "男"){
                $personal[$k]['u_sex'] = 1;
            }elseif($v['u_sex'] == "女"){
                $personal[$k]['u_sex'] = 2;
            }else{
                $personal[$k]['u_sex'] = 0;
            }
            if($v['u_marriage'] == "未婚"){
                $personal[$k]['u_marriage'] = 1;
            }else if($v['u_marriage'] == "离婚"){
                $personal[$k]['u_marriage'] =3;
            }else if($v['u_marriage'] == "已婚"){
                $personal[$k]['u_marriage'] =2;
            }else{
                $personal[$k]['u_marriage'] = 0;
            }
            if($v['u_formal'] == "初中"){
                $personal[$k]['u_formal'] =1;
            }elseif($v['u_formal'] == "中专"){
                $personal[$k]['u_formal'] = 2;
            }elseif($v['u_formal'] == "高中"){
                $personal[$k]['u_formal'] = 3;
            }elseif($v['u_formal'] == "大专"){
                $personal[$k]['u_formal'] = 4;
            }elseif($v['u_formal'] == "本科"){
                $personal[$k]['u_formal'] = 5;
            }else{
                $personal[$k]['u_formal'] = 0;
            }
            $personal[$k]['u_in_time'] = date('Y-m-d',($v['u_in_time']-25569)*24*60*60);
            $personal[$k]['create_time'] = time();
            $personal[$k]['update_time'] = time();
            $acc[$k] = [
                'u_id'=>$v['u_id'],
                'a_account'=>$v['a_account'],
                'a_personal'=>$v['a_personal'],
                'a_amount' =>$v['a_amount'],
                'a_month'=>$v['a_month'],
                'a_month_personal'=>$v['a_month_personal'],
                'a_open'=>$v['a_open'],
                'a_id_card'=>$v['a_id_card'],
                'a_zhuanhu'=>$v['a_zhuanhu'],
                'create_time'=>time(),
                'update_time'=>time(),
            ];
            if($v['a_zhuanhu'] == '是'){
                $acc[$k]['a_zhuanhu'] = 2;
            }elseif($v['a_zhuanhu'] == '否'){
                $acc[$k]['a_zhuanhu'] = 1;
            }else{
                $acc[$k]['a_zhuanhu'] = 0;
            }
            $wage[$k] = [
                'u_id' => $v['u_id'],
                'w_jishu' => $v['w_jishu'],
                'w_kaihu' => $v['w_kaihu'],
                'w_id_card' => $v['w_id_card'],
                'w_liushui' => $v['w_liushui'],
                'w_date' => $v['w_date'],
                'create_time' => time(),
                'update_time' => time(),
            ];
            if($v['w_liushui'] == "是"){
                $wage[$k]['w_liushui'] = 2;
            }elseif($v['w_liushui'] == "否"){
                $wage[$k]['w_liushui'] = 1;
            }else{
                $wage[$k]['w_liushui'] = 0;
            }
            $qita[$k] = [
                'u_id' => $v['u_id'],
                'q_yue' => $v['q_yue'],
                'q_dai' => $v['q_dai'],
                'q_dan' => $v['q_dan'],
                'q_dongjie' => $v['q_dongjie'],
                'create_time' => time(),
                'update_time' => time(),

            ];
            if($v['q_dai'] == "是"){
                $qita[$k]['q_dai'] = 2;
            }elseif($v['q_dai'] == "否"){
                $qita[$k]['q_dai'] = 1;
            }else{
                $qita[$k]['q_dai'] = 0;
            }
            if($v['q_dan'] == "是"){
                $qita[$k]['q_dan'] = 2;
            }elseif($v['q_dan'] == "否"){
                $qita[$k]['q_dan'] = 1;
            }else{
                $qita[$k]['q_dan'] = 0;
            }
            if($v['q_dongjie'] == "是"){
                $qita[$k]['q_dongjie'] = 2;
            }elseif($v['q_dongjie'] == "否"){
                $qita[$k]['q_dongjie'] = 1;
            }else{
                $qita[$k]['q_dongjie'] = 0;
            }
            $user = Personnel::where('u_id_cart',$v['u_id_cart'])->first();
            if($user){
               return json_encode(['code'=>1,'message'=>"数据重复"]);
            }
        }
        $res = Personnel::insert($personal);
        $re = Accumulation::insert($acc);
        $wage = Wage::insert($wage);
        $qita = Qita::insert($qita);
        if(!$qita){
            return json_encode(['code'=>3,'message'=>"导入失败"]);
        }
        if(!$wage){
            return json_encode(['code'=>3,'message'=>"导入失败"]);
        }
        if(!$re){
            return json_encode(['code'=>3,'message'=>"导入失败"]);
        }
        if($res){
            return json_encode(['code'=>2,'message'=>"导入成功"]);
        }else{
            return json_encode(['code'=>3,'message'=>"导入失败"]);
        }

    }
    //删除
    public function delete()
    {
        $u_id = request()->input('u_id');
        $res = Personnel::where('u_id',$u_id)->delete();
        $re = Accumulation::where('u_id',$u_id)->delete();
        $result = Wage::where('u_id',$u_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        if(!$res){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        if(!$re){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }

    public function dels()
    {
        $u_id = request()->input('u_id');
        $u_id = explode(',',trim($u_id,','));
        $res = Personnel::whereIN('u_id',$u_id)->delete();
        $re = Accumulation::whereIN('u_id',$u_id)->delete();
        $result = Wage::whereIN('u_id',$u_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        if(!$res){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        if(!$re){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }


//导出
public function export()
{
    $u_id = request()->input('u_id');
    $u_id = explode(',',trim($u_id,','));
    $data = Personnel::join('accumulation','personnel.u_id','=','accumulation.u_id')
        ->join('wage','personnel.u_id','=','wage.u_id')
        ->join('qita','personnel.u_id','=','qita.u_id')
        ->whereIN('personnel.u_id',$u_id)
        ->get()->toArray();
    foreach($data as $k=>$v){
        if($v['u_sex'] == 1){
            $v['u_sex'] = "男";
        }elseif($v['u_sex'] == 2){
            $v['u_sex'] = "女";
        }else{
            $v['u_sex'] = " ";
        }
        if($v['u_marriage'] == 1){
            $v['u_marriage'] = "未婚";
        }else if($v['u_marriage'] == 3){
            $v['u_marriage'] ="离婚";
        }else if($v['u_marriage'] == 2){
            $v['u_marriage'] ="已婚";
        }else{
            $v['u_marriage'] =" ";
        }
        if($v['u_formal'] == 1){
            $v['u_formal'] ="初中";
        }elseif($v['u_formal'] == 2){
            $v['u_formal'] = "中专";
        }elseif($v['u_formal'] == 3){
            $v['u_formal'] = "高中";
        }elseif($v['u_formal'] == 4){
            $v['u_formal'] = "大专";
        }elseif($v['u_formal'] == 5){
            $v['u_formal'] = "本科";
        }else{
            $v['u_formal'] = " ";
        }
        if($v['a_zhuanhu'] == 2){
            $v['a_zhuanhu'] = "是";
        }elseif($v['a_zhuanhu'] == 1){
            $v['a_zhuanhu'] = "否";
        }else{
            $v['a_zhuanhu'] = " ";
        }
        if($v['w_liushui'] == 2){
            $v['w_liushui'] = "是";
        }elseif($v['w_liushui'] == 1){
            $v['w_liushui'] = "否";
        }else{
            $v['w_liushui'] = " ";
        }
        if($v['q_dai'] == 2){
            $v['q_dai'] = "是";
        }elseif($v['q_dai'] == 1){
            $v['q_dai'] = "否";
        }else{
            $v['q_dai'] = " ";
        }
        if($v['q_dan'] == 2){
            $v['q_dan'] = "是";
        }elseif($v['q_dan'] == 1){
            $v['q_dan'] = "否";
        }else{
            $v['q_dan'] = " ";
        }
        if($v['q_dongjie'] == 2){
            $v['q_dongjie'] = "是";
        }elseif($v['q_dongjie'] == 1){
            $v['q_dongjie'] = "否";
        }else{
            $v['q_dongjie'] = " ";
        }
        $v['create_time'] = time();
        $v['update_time'] = time();
        $data[$k]=$v;
    }

    return json_encode(['data'=>$data]);
}

public function addgong(Request $request)
{
    return view('yuan.addgong');
}
public function dogong()
{
    $data = request()->input();
    $acc = [
        'u_id' =>$data['u_id'],
        'a_account' =>$data['a_account'],
        'a_personal' =>$data['a_personal'],
        'a_amount' =>$data['a_amount'],
        'a_month' =>$data['a_month'],
        'a_month_personal' =>$data['a_month_personal'],
        'a_open' =>$data['a_open'],
        'a_id_card' =>$data['a_id_card'],
        'a_zhuanhu' =>$data['a_zhuanhu'],
        'create_time'=>time(),
        'update_time'=>time()
    ];
    $res = Accumulation::insert($acc);
    if($res){
        return json_encode(['code'=>2,'message'=>"添加成功"]);
    }else{
        return json_encode(['code'=>1,'message'=>"添加失败"]);
    }
}
public function name()
{
    $u_name = request()->input('u_name');
    $u_id = Personnel::where('u_name',$u_name)->first(['u_id','u_name']);
    // 要执行的代码
    if(empty($u_id)){
        return json_encode(['code'=>1,'message'=>"请先添加人员信息"]);
    }
    return json_encode(['code'=>2,'u_id'=>$u_id->u_id,'u_name'=>$u_id->u_name]);

}
public function cart()
{
    $cart = request()->input('cart');
    $count = Accumulation::where('a_id_card',$cart)->count();
    if($count){
        return json_encode(['code'=>1,'message'=>"已有此银行卡号"]);
    }
}
//公积金列表
public function gong()
{
    $name = request()->input('name');
    $a_account = request()->input('a_account');
    $a_id_card = request()->input('a_id_card');
    $where = [];
    if(!empty($name)){
        $where[] = ['u_name','=',$name];
    }
    if(!empty($a_account)){
        $where[] = ['a_account','=',$a_account];
    }
    if(!empty($a_id_card)){
        $where[] = ['a_id_card','=',$a_id_card];
    }
    $data = Accumulation::where($where)->join('personnel','accumulation.u_id','=','personnel.u_id')->paginate(10);
    return view('yuan.gong',[
        'data'=>$data,
        'name'=>$name,
        'a_account'=>$a_account,
        'a_id_card'=>$a_id_card
    ]);
}

public function addwage()
{
    return view('yuan.addwage');
}
public function dowage()
{
    $data = request()->input();
    $wage = [
        'u_id'=>$data['u_id'],
        'w_jishu'=>$data['w_jishu'],
        'w_kaihu'=>$data['w_kaihu'],
        'w_id_card'=>$data['w_id_card'],
        'w_liushui'=>$data['w_liushui'],
        'w_date'=>$data['w_date'],
        'create_time'=>time(),
        'update_time'=>time(),
    ];
    $res = Wage::insert($wage);
    if($res){
        return json_encode(['code'=>2,'message'=>"添加成功"]);
    }else{
        return json_encode(['code'=>1,'message'=>"添加失败"]);
    }
}

public function wage()
{
    $name = request()->input('name');
    $id_cart = request()->input('id_cart');
    $where = [];
    if(!empty($name)){
        $where[] = ['u_name','=',$name];
    }
    if(!empty($id_cart)){
        $where[] = ['w_id_card','=',$id_cart];
    }
    $data = Wage::where($where)->join('personnel','wage.u_id','=','personnel.u_id')->paginate(10);
    return view('yuan.wage',[
        'data'=>$data,
        'name'=>$name,
        'id_cart'=>$id_cart
    ]);
}
}
