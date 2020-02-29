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
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIEpAIBAAKCAQEAkTxjEqMdWN1U38Iea7/5ip4Cj0kK0vp23Nfv+NpkPFrcdSbsMFbilXNzbWGneinHnWlMDBU+vCdLeNOu/JEWy69EEUo8diKMrVTSaVfh2zPM7Ht8JYufNkc/PDDCRAD6bq1H/+ecsIYhnU3HBashqZkdneznEaYpCz3xqsZEkVZSR14L9PFN0eGBNhzpT+MqPCZGZbVyPaEfHDENOcimx4/tcOO4qdcRMiIzwW7W5ErKGNs14ydW+o5IAVOdyCkgl+rH+PVoGalo8oVsfNk58FOWjGNmb7ytB+/KDAZav5VuDUNd7wAL7UwCmNb0/B2trFdDDZ0+DB/7gkJrtk1iBwIDAQABAoIBABSV05ELr5gt3t7MO9WX4z3DgadfefpHZ9uLe8bw5W4sjrzIJIgBeKIoN/8T7VICY/mquA2qYTb39tmMX2wLAIkkMWil9gXkhb33nM8zlp6kK/KE2ibUMF/YH11fp9lNrjFLvD3ITUwz5sXOBVyHUgEg47LDpki5HW4rfHpxGbzjoBNVVLP4sphu9ttmUdIZ2HAdjA7oyVlRKayDvTaU0h97BSRKsxKostX3DeVxl7g0nFc/PQ+t52t9+S85eCwg94mzzIpBr0hHBnUBdfxC2qmjNGX7q4WKZlAzPuaMzK/9Qfyq87zfY58OH5NDPjWvq0VEkg6MmjMEweSm1hsa/SkCgYEA9Li2DtUdeb5WWHoxI3hoD6azkRiJmaQg11IvXoY/fJ/2/NC+7xZSh9DKjWWhMkbu/+tA1vkJh4iEQU1npOrlNEfGnkfuR/+iO1yaY2FJHeORgnyLUJWZcKaHFcdgRufsJHOjTxDgNQo67o/3/f6KCCEcRU+aeJcssc5PgOS9oUUCgYEAl+3rCjv7cX4St1gmmzIT/S3MGzs7/SQAPUUvoa81QRNrgTi3pE5SeZkSF/HvEXPfV/m/ZvbSg93QPiyyasBL5aAN8Xf5OHcdkE2FiMVVcAKQlJ8myASxD5t9LZcymMSCSp8xpMS9FIZ5UYJbr50KCxovkpZx3tl9D2dCIUALfNsCgYEAhFBiTv63Ix3gPZJDgzQUv3GYYPjtXN66yvCqn+bh6JXsyqBqu4ZMNRaUjYLHdxGXI1OlCRY5KsiLCWu6gBZouq2cG/Q0R0VWB9Z3uwfcqoZiJDUGdhmMjrXbD9Fuoqe+q67CO3uaXdMcLeQ1Z2T6aI7OZEM397908OXlYoFKbikCgYBvri2bfVItMD6z1bGzXZGCB5tE3TsQrtkaMPR9hty/tHXPLJEZz5Ui25mIToitLJ8d/XFsT72Zv4DnY1XX0Pk5l3kIameh0TXDMKkbS+utBcWf6onIeGJrlaHj1IQV9kXMcs88Tn6rStp9RzT8l5SdaqdTuxGDfh5HJ2FeLcUEBwKBgQDDRCA4I3xdW57hpTSF2iNor3UB4WfafPsefB2Nv7gxnZ0WqE84MeDq8qv+qu6jNRYdk1yxUYF0hHh8NnMeplWfEVudSCJLupOl+sqfjrW9nnrnpwC/YbTDTQcSZl4k4uPNae+ZoRFJTPA8QTYRE/AbL/Il0bMvbRgRIeo4bA4KBg=='),

        // optional，默认 warning；日志路径为：sys_get_temp_dir().'/logs/yansongda.pay.log'
        'log' => [
            'file' => storage_path('logs/alipay.log'),
            'level' => 'debug',
//            'type' => 'daily', // optional, 可选 daily.
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
