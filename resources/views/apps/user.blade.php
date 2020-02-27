@extends('layouts.apps')
@section('content')
<div class="index_header">
    <a href="javascript:;" onclick="history.go(-1)" class="back"></a>
    参保人信息
    <a href="tel:400-862-0588"><img src="/templates/new_module/images/tel.png" alt="" class="index_tel"></a>
</div>
<div style="height: 1.26666rem;"></div>
<div class="buy_info_con" style="background: #FFFFFF;">
    <ul>
        <li class="buy_info_item">
            参保人姓名
            <input type="text" class="buy_info_item_rt" id="id_name" value="{{$data->u_name}}" placeholder="请输入参保人姓名">
        </li>
        <li class="buy_info_item">
            身份证号
            <input type="text" class="buy_info_item_rt" id="id_no"  value="{{$data->u_id_cart}}" placeholder="请输入参保人身份证号">
        </li>
    </ul>
</div>
<p style="padding: 0.4rem;font-size: 0.346666rem;color: #888888;">注：男性超过60岁，女性超过50岁，无法在人人保参保</p>

<div class="buy_now_bottom" style="padding:0;background: transparent;border: none">
    <div class="buy_now_btn">确定</div>
</div>

<!--弹框样式-->
<div class="content_href">
    <div class="content_con_warp">
        <div class="content_con">
            <img src="/templates/new_module/images/logo.png" alt="" class="content_logo">
            <p>人人保.专业客服.答疑解惑</p>
            <div>
                <div class="btn line_btn"><a href="http://p.qiao.baidu.com/cps/chat?siteId=13047548&userId=27282829">在线咨询</a></div>
                <div class="btn"><a href="tel:400-862-0588">电话联系</a></div>
            </div>
        </div>
        <img src="/templates/images/close1@2x.png" alt="" class="close">
    </div>
</div>
<script>
    $(document).on('click','.buy_now_btn',function(){
        $.ajax({
            url:"{{url('app/users')}}",
            type:"post",
            dataType:"json",
            success:function(res){
                console.log(res);
            if(res.code==1){
                location.href="/app/order_cofirm";
            }else{
                location.href='/app/index';
            }

            }
        });
    });

</script>
@endsection
