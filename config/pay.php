<?php

return [
    'alipay' => [
        // 支付宝分配的 APPID
        'app_id' => env('ALI_APP_ID', '2016092900622122'),

        // 支付宝异步通知地址
        'notify_url' => 'http://renli.wangyunxing.club/pay/notify',

        // 支付成功后同步通知地址
        'return_url' => 'http://renli.wangyunxing.club/pay/return',

        // 支付宝公钥
        'ali_public_key' => env('ALI_PUBLIC_KEY', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv/GJTDZ8PugqTD0b+T/z08fw1PBzFuTLBTwjsuQgUUocdgGEZSfAolWCVD1QZq6b9XgunPP8xC2uu9HgvyJ1cLBiQWxEWmfc5bkj5AUzdHwRsoyR6QxfH9K6oUdUND1CmzttuGT6ddO4z7aHfgNlouSSSQFr1k3Y4XwFIJvPWdy0tCSPtkRiyT8jsdh7GEONTl91A+PuolZQzFhP6JLSqXXHl5b60riLX3dYqpAQHkUaOZtm1jJFlpcXRNdxZjoIqpMlGy5wk1rWlST7ZqUsM0HjZ8BX+7CQ+8w6zyslQ4YtYk4HEitux7v0tKUoKDDEYuWzSF4YA0oeFvqXVYD97QIDAQAB'),

        // 自己的私钥，签名时使用 生成的私钥和支付宝公钥一块
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv/GJTDZ8PugqTD0b+T/z08fw1PBzFuTLBTwjsuQgUUocdgGEZSfAolWCVD1QZq6b9XgunPP8xC2uu9HgvyJ1cLBiQWxEWmfc5bkj5AUzdHwRsoyR6QxfH9K6oUdUND1CmzttuGT6ddO4z7aHfgNlouSSSQFr1k3Y4XwFIJvPWdy0tCSPtkRiyT8jsdh7GEONTl91A+PuolZQzFhP6JLSqXXHl5b60riLX3dYqpAQHkUaOZtm1jJFlpcXRNdxZjoIqpMlGy5wk1rWlST7ZqUsM0HjZ8BX+7CQ+8w6zyslQ4YtYk4HEitux7v0tKUoKDDEYuWzSF4YA0oeFvqXVYD97QIDAQAB'),

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/alipay.log'),
            'level' => 'debug',
              'type' => 'daily', // optional, 可选 daily.
            //  'max_file' => 30,
        ],

        // optional，设置此参数，将进入沙箱模式
        'mode' => 'dev',
    ],

    'wechat' => [
        // 公众号 APPID
        'app_id' => env('WECHAT_APP_ID', ''),

        // 小程序 APPID
        'miniapp_id' => env('WECHAT_MINIAPP_ID', ''),

        // APP 引用的 appid
        'appid' => env('WECHAT_APPID', ''),

        // 微信支付分配的微信商户号
        'mch_id' => env('WECHAT_MCH_ID', ''),

        // 微信支付异步通知地址
        'notify_url' => '',

        // 微信支付签名秘钥
        'key' => env('WECHAT_KEY', ''),

        // 客户端证书路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_client' => '',

        // 客户端秘钥路径，退款、红包等需要用到。请填写绝对路径，linux 请确保权限问题。pem 格式。
        'cert_key' => '',

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/wechat.log'),
            //  'level' => 'debug'
            //  'type' => 'single', // optional, 可选 daily.
            //  'max_file' => 30,
        ],

        // optional
        // 'dev' 时为沙箱模式
        // 'hk' 时为东南亚节点
        // 'mode' => 'dev',
    ],
];
