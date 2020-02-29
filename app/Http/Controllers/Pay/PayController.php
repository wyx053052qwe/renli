<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use App\Model\Pays;
use App\Model\Personnel;
use App\Model\Shop;
use App\Model\Wage;
use DB;
use Illuminate\Http\Request;
use Log;
use Pay;

class PayController extends Controller
{
    public function index()
    {
        $data = DB::table('alipay')->join('personnel', 'alipay.u_id', '=', 'personnel.u_id')->paginate(10);
        return view('pay.index', [
            'data' => $data,
        ]);
    }

    public function pay()
    {
        $type = request()->input('type');
        $data = Shop::where('type', $type)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        return view('pay.pay', [
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
        ]);
    }
    public function payg()
    {
        $type = request()->input('type');
        $data = Shop::where('type', $type)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        return view('pay.payg', [
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
        ]);
    }
    public function socials()
    {
        $data = request()->post();
        $p_id = session('u_id');
        $user = DB::table('alipay')->where(['u_id' => $p_id, 'a_status' => 1])->first();
        if ($user) {
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        if(empty($user)){
            Pays::where(['u_id'=>$p_id,'p_status'=>1])->delete();
        }
        $dataa = Pays::where(['u_id'=>$p_id,'p_status'=>1])->first();
        if($dataa){
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        $date = Wage::where('u_id', $p_id)->first(['w_jishu']);
        $userData = Personnel::where('u_id', $p_id)->first(['u_company', 'u_id_cart']);
        $type = $data['type'];
        $money = $data['many'];
        $jishu = (int) $date['w_jishu'];
        $fu = trim($money, '￥ .');
        $dangtime = date('d');
        $date1 = date('Y-m', time());
        if ($dangtime > 15) {
            $date = date('Y-m', strtotime("$date1 +1 month"));
        } else {
            $date = date('Y-m', time());
        }

        if ($type == 4) {
            $month = $date . '~' . date('Y-m', strtotime("$date +11 month"));
            $ji = ($jishu * 0.08) * 12;
            $ji2 = ($jishu  * 0.08) * 12;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 3) {
            $month = $date . '~' . date('Y-m', strtotime("$date +5 month"));
            $ji = ($jishu * 0.08) * 6;
            $ji2 = ($jishu  * 0.08) * 6;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 2) {
            $month = $date . '~' . date('Y-m', strtotime("$date +2 month"));
            $ji = ($jishu * 0.08) * 3;
            $ji2 = ($jishu  * 0.08) * 3;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 1) {
            $month = $date . '~' . $date;
            $ji = ($jishu * 0.08) * 1;
            $ji2 = ($jishu  * 0.08) * 1;
            $zong = $ji + $ji2 + $fu;
        }

        $pay = [
            'u_id' => $p_id,
            'p_id_cart' => $userData['u_id_cart'],
            'p_gongsi' => $userData['u_company'],
            'p_month' => $month,
            'p_money' => $zong,
            'type'=>1,
            'delete'=>1,
            'p_status'=>1,
            'create_time' => time(),
        ];

        $res = Pays::insert($pay);
        if ($res) {
            return json_encode(['code' => 2, 'message' => "订单创建成功"]);
        } else {
            return json_encode(['code' => 1, 'message' => "失败"]);
        }

    }
    public function socialss()
    {
        $data = request()->post();
        $p_id = session('u_id');
        $user = DB::table('alipay')->where(['u_id' => $p_id, 'a_status' => 1])->first();
        if ($user) {
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        $dataa = Pays::where(['u_id'=>$p_id,'p_status'=>1])->first();
        if($dataa){
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        $date = Wage::where('u_id', $p_id)->first(['w_jishu']);
        $userData = Personnel::where('u_id', $p_id)->first(['u_company', 'u_id_cart']);
        $type = $data['type'];
        $money = $data['many'];
        $jishu = (int) $date['w_jishu'];
        $fu = trim($money, '￥ .');
        $dangtime = date('d');
        $date1 = date('Y-m', time());
        if ($dangtime > 15) {
            $date = date('Y-m', strtotime("$date1 +1 month"));
        } else {
            $date = date('Y-m', time());
        }

        if ($type == 4) {
            $month = $date . '~' . date('Y-m', strtotime("$date +11 month"));
            $ji = ($jishu * 0.08) * 12;
            $ji2 = ($jishu  * 0.08) * 12;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 3) {
            $month = $date . '~' . date('Y-m', strtotime("$date +5 month"));
            $ji = ($jishu * 0.08) * 6;
            $ji2 = ($jishu  * 0.08) * 6;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 2) {
            $month = $date . '~' . date('Y-m', strtotime("$date +2 month"));
            $ji = ($jishu * 0.08) * 3;
            $ji2 = ($jishu  * 0.08) * 3;
            $zong = $ji + $ji2 + $fu;
        } else if ($type == 1) {
            $month = $date . '~' . $date;
            $ji = ($jishu * 0.08) * 1;
            $ji2 = ($jishu  * 0.08) * 1;
            $zong = $ji + $ji2 + $fu;
        }

        $pay = [
            'u_id' => $p_id,
            'p_id_cart' => $userData['u_id_cart'],
            'p_gongsi' => $userData['u_company'],
            'p_month' => $month,
            'p_money' => $zong,
            'type'=>2,
            'delete'=>1,
            'p_status'=>1,
            'create_time' => time(),
        ];
        $res = Pays::insert($pay);
        if ($res) {
            return json_encode(['code' => 2, 'message' => "订单创建成功"]);
        } else {
            return json_encode(['code' => 1, 'message' => "失败"]);
        }

    }
    public function cofirm()
    {
        $p_id = session('u_id');
//        $user = DB::table('alipay')->where(['u_id' => $p_id, 'a_status' => 1])->first();
//        if ($user) {
//            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);die;
//        }
        $data = Personnel::where('personnel.u_id', $p_id)
            ->join('wage', 'personnel.u_id', '=', 'wage.u_id')
            ->join('pay', 'personnel.u_id', 'pay.u_id')
            ->first(['u_name', 'u_id_cart', 'u_company', 'p_month', 'w_jishu', 'p_money']);
        return view('pay.cofirm', [
            'data' => $data,
        ]);
    }
    public function order()
    {
        $p_id = session('u_id');
        $data = DB::table('alipay')
            ->join('personnel','alipay.u_id','=','personnel.u_id')
            ->where(['alipay.u_id'=>$p_id,'a_status'=>1,'a_delete'=>1])->get();
//dd($data);
        if($data->first()){
            $data = $data;
        }else{
            $data = [];
        }
//        dd($data);
        return view('pay.order',[
            'data'=>$data,
        ]);
    }
    public function orders()
    {
        $p_id = session('u_id');
        $data = DB::table('alipay')
            ->join('personnel','alipay.u_id','=','personnel.u_id')
            ->where(['alipay.u_id'=>$p_id,'a_status'=>2,'a_delete'=>1])->get();
        if($data->first()){
            $data = $data;
        }else{
            $data = [];
        }
        return view('pay.orders',[
            'data'=>$data,
        ]);
    }
    public function pays()
    {
        $p_id = session('u_id');
        $data = Pays::where(['u_id'=>$p_id,'p_status'=>1])->first(['p_money', 'type','p_month']);
//        dd($data);
        if (empty($data)) {
            return redirect('/');
        }
        if ($data['type'] == 1) {
            $type = "社保";
        } else if ($data['type'] == 2) {
            $type = "公积金";
        }
        $out_trade_no = rand(1000, 9999) . time();
        $order = [
            'out_trade_no' => $out_trade_no,
            'total_amount' => $data['p_money'],
            'subject' => $type,
        ];
        $arr = DB::table('alipay')->where(['u_id'=>$p_id,'a_status'=>1])->first();
        if(empty($arr)){
            DB::table('alipay')->insert([
                'out_trade_no'=>$out_trade_no,
                'total_amount'=>$data['p_money']*100,
                'u_id'=>$p_id,
                'a_month'=>$data['p_month'],
                'a_status' => 1,
                'a_delete'=>1,
                'created_time'=>time(),
                'type'=>$data['type']
            ]);
        }

        return Pay::alipay()->web($order);
    }
//同步回调 创建订单
    function return () {
        $data = Pay::alipay()->verify(); // 是的，验签就这么简单！
        if ($data) {
            $total_amount = $data->total_amount * 100;
            $p_id = session('u_id');
            $arr = [
                'out_trade_no' => $data->out_trade_no,
                'trade_no' => $data->trade_no,
                'total_amount' => $total_amount,
                'app_id' => $data->app_id,
                'a_status' => 1,
                'u_id' => $p_id,
            ];
            DB::table('alipay')->where('out_trade_no',$data->out_trade_no)->update([
                'trade_no'=>$data->trade_no,
                'app_id'=>$data->app_id,
                'u_id' => $p_id,

            ]);
            return view('pay.return',[
                'total_amount'=>$total_amount
            ]);
        } else {
            echo "支付失败";
        }

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }
//支付宝异步回调 修改订单状态
    public function notify()
    {
        $alipay = Pay::alipay();
            $data = $alipay->verify(); // 是的，验签就这么简单！
            //商户订单号
            $out_trade_no = $data['out_trade_no'];
            //支付宝交易号
            $trade_no = $data['trade_no'];
            //交易状态
            $trade_status = $data['trade_status'];
            $buyer_id = $data['buyer_id'];
            $seller_id = $data['seller_id'];
            $app_id = $data['app_id'];
            $total_amount = $data['total_amount'];

//            if ($trade_status == 'TRADE_FINISHED') {
//                //注意：
//                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
//                $this->UserCharge($total_amount, 'alipay', $out_trade_no, $buyer_id, 2, $seller_id, $app_id);
//            } else
            if ($trade_status == 'TRADE_SUCCESS') {
                //注意：
                //付款完成后，支付宝系统发送该交易状态通知
                $this->UserCharge($total_amount, 'alipay', $out_trade_no, $buyer_id, 2, $seller_id, $app_id);
                DB::table('alipay')->where(['out_trade_no'=>$out_trade_no])->update(['a_status' => 2, 'updated_time' => time()]);
                //修改订单状态
            }
            //写入日志便于查看
            Log::debug('Alipay notify', $data->all());

            //抛出异常
//            $e->getMessage();
        return $alipay->success(); // laravel 框架中请直接 `return $alipay->success()`
    }
    public function del()
    {
        $data = request()->input();
        $id = $data['id'];
        $p_id = DB::table('alipay')->where('p_id',$id)->first(['u_id']);
        if(empty($p_id)){
            return json_encode(['code'=>1,'message'=>"失败"]);
        }
        $p_id= $p_id->u_id;
        $res = DB::table('alipay')->where('p_id',$id)->update(['a_delete'=>2]);
        if($res){
            return json_encode(['code'=>2,'message'=>"成功"]);
        }else{
            return json_encode(['code'=>1,'message'=>"失败"]);
        }
    }
    //删除
    public function delete()
    {
        $p_id = request()->input('p_id');
        $result = DB::table('alipay')->where('p_id',$p_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
    public function dels()
    {
        $p_id = request()->input('p_id');
        $p_id = explode(',',trim($p_id,','));
        $result = DB::table('alipay')->whereIN('p_id',$p_id)->delete();
        if(!$result){
            return json_encode(['code'=>1,'message'=>"删除失败"]);
        }
        return json_encode(['code'=>2,'message'=>"删除成功"]);
    }
}
