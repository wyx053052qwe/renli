<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport" />

    <title>支付成功</title>
    <link rel="stylesheet" href="/pay/css/index.css" />
</head>

<body>
<div class="index-header">
    <img src="/pay/img/zfb.png" />
    <p>支付成功</p>
    <p><a>{{$total_amount/100}}.00元</a></p>
    <p><c>预计一小时内到账，部分账单可能出现延迟，以实际到账时间为准</c></p>
</div>
<div class="index-back">
    <a href="/pay/orders">查看订单</a>
    <a href="/">返回首页</a>
</div>
</body>

</html>
