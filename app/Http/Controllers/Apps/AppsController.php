<?php

namespace App\Http\Controllers\Apps;

use App\Model\Pays;
use App\Model\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Wage;
use App\Model\Personnel;
use Yansongda\Pay\Pay;

class AppsController extends Controller
{
    public function index()
    {
        return view('apps.index');
    }
    public function login()
    {
        return view('apps.login');
    }
    public function shebao()
    {
        $data = Shop::where('type', 1)->orderBy('created_at', 'desc')->first();
        $nian = json_decode($data['nian']);
        $ban = json_decode($data['ban']);
        $ji = json_decode($data['ji']);
        $yue = json_decode($data['yue']);
        return view('apps.shebao', [
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
        return view('apps.gongjijin', [
            'nian' => $nian,
            'ban' => $ban,
            'ji' => $ji,
            'yue' => $yue,
        ]);

    }
    public function order()
    {
        $u_id = session('u_id');
        $data = DB::table('alipay')
            ->join('personnel','alipay.u_id','=','personnel.u_id')
            ->join('pay','alipay.u_id','=','pay.u_id')
            ->where(['alipay.u_id'=>$u_id])->get();
//dd($data);
        if($data->first()){
            $data = $data;
        }else{
            $data = [];
        }
//        dd($data);
        return view('apps.order',[
            'data'=>$data,
        ]);
    }
    public function orders()
    {
        $u_id = session('u_id');
        $data = DB::table('alipay')
            ->join('personnel','alipay.u_id','=','personnel.u_id')
            ->join('pay','alipay.u_id','=','pay.u_id')
            ->where(['alipay.u_id'=>$u_id,'pay.p_status'=>2])->get();
        if($data->first()){
            $data = $data;
        }else{
            $data = [];
        }
        return view('apps.orders',[
            'data'=>$data,
        ]);
    }
    public function socials()
    {
        $data = request()->post();
        $u_id = session('u_id');
        $user = DB::table('alipay')->where(['u_id' => $u_id, 'a_status' => 1])->first();
        if ($user) {
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        if(empty($user)){
            Pays::where(['u_id'=>$u_id,'p_status'=>1])->delete();
        }
        $dataa = Pays::where(['u_id'=>$u_id,'p_status'=>1])->first();
        if($dataa){
            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);
        }
        $date = Wage::where('u_id', $u_id)->first(['w_jishu']);
        $userData = Personnel::where('u_id', $u_id)->first(['u_company', 'u_id_cart']);
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
            'u_id' => $u_id,
            'p_id_cart' => $userData['u_id_cart'],
            'p_gongsi' => $userData['u_company'],
            'p_month' => $month,
            'p_money' => $zong,
            'type'=>1,
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
    public function user()
    {
        $uid = session('u_id');
        $data = Personnel::where('u_id',$uid)->first(['u_name','u_id_cart']);
        return view('apps.user',[
            'data'=>$data,
        ]);
    }
    public function users()
    {
        $uid = session('u_id');
        if($uid){
            return json_encode(['code'=>1,'message'=>"确认"]);
        }else{
            return json_encode(['code'=>2,'message'=>"取消"]);
        }
    }
    public function order_cofirm()
    {
        $u_id = session('u_id');
//        $user = DB::table('alipay')->where(['u_id' => $u_id, 'a_status' => 1])->first();
//        if ($user) {
//            return json_encode(['code' => 3, 'message' => "你有订单未支付请先支付"]);die;
//        }
        $data = Personnel::where('personnel.u_id', $u_id)
            ->join('wage', 'personnel.u_id', '=', 'wage.u_id')
            ->join('pay', 'personnel.u_id', 'pay.u_id')
            ->first(['u_name', 'u_id_cart', 'u_company', 'p_month', 'w_jishu', 'p_money']);
//        dd($data);
        return view('apps.cofirm',[
            'data'=>$data
        ]);
    }
//发送支付请求
    public function send(Request $request)
    {
        $u_id = session('u_id');
        $data = Pays::where(['u_id'=>$u_id])->first(['p_money', 'type']);
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
        $arr = DB::table('alipay')->where(['u_id'=>$u_id,'a_status'=>1])->first();
        if(empty($arr)){
            DB::table('alipay')->insert([
                'out_trade_no'=>$out_trade_no,
                'total_amount'=>$data['p_money']*100,
                'u_id'=>$u_id,
                'a_status' => 1,
                'type'=>$data['type']
            ]);
        }
        $config =  config('pay.alipay'); //取出配置信息，根据需求动态改变
        $config['return_url'] ='http://www.reci.com/web/pay/jump/'.$data['p_money'];

        $order = [
            'out_trade_no' => $out_trade_no, //我方订单号
            'total_amount' => $data['p_money'],  //支付金额，单位(元)
            'subject' => '$type',
        ];

        $alipay = Pay::alipay($config)->wap($order);
        return $alipay; //返回form表单信息
    }

}
