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
        'private_key' => env('ALI_PRIVATE_KEY', 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCW/2BG2L2uwuMhuphWY/B7rJxZil1Ce3F7dewyqU0iE534J/ON8Qci4lD5xd9RVcTopjkJOgx9rniJzMr+ylKF09cdZ0QNuOwHDFgkkW14LCUlJSyGenNP3R6ErAlhQF4beDtFyDRvnzWsYQOZFAjcB56W4PG06RLCBsYJb+m7f3GnAFZIukg4BX3JFWUOu/JHhGQNHjSsSXmsbiQqy7gAi+6aC9rYZXPnjnS8q8cKfLkRipScQJfSTY2cY206fGq5L/FKevev1SvrCPtsMeWqqBC8Arnv3IbfhaGhHYTb2BNU6+Jq0pP1XR8KdWdqRghu9B9O62eW8R5q2KZp2OUtAgMBAAECggEAEl4WNAgBatTCFERCa5/UjPa+PhYaqg+iCkaZ6L+3ZkHEoX8anVWIbLHi778mHxqzzSkLHxg0lMU4XGrQ9pVd3HGcZTM+j/zCmUjjH++gxVF5Yz9WXzVd+YUIRVM4AOB3khfZ/e8QkdNoEAPtEB3jxgAXRnsua7c+VOPGCzfV0rzJx8iDstazPMmPJnxyHs2eefBaUcclexd0J84c/t/qLl4sW9PlUWDmcRuXW65D3xnBEjH2WYWFa60doBvEeVEdlgy2S2uIJMIlFEx8Q5Ufzoe/4H9F3ILG1aEvbESKK4o1RpnNS/KH2IlYsqYJJbpqlFzBvlU2tBsQtWGpb/3YAQKBgQDdQyi+8O/3DOgeKlM6Y0YfNX9jOLI1SfUVp+Pa0L3XHjlklprLxwYdn+Egz41Yj6sqJywY7vBDOrky4GzFDVJ1CX3xUzNFHfp6o1/8IU8trK0r9YrNqXNqcXGbE6NUF3P7EbGvQmqMb0xLkuVzEmyrupcbFXMqOltELWDybtzEgQKBgQCutC2KY+p9wcKwq53LxQezvi34aYE3MBNrXPgVz9AwUjDMOqqyKGwPLtItiw9J9MshWYJNlIb0mhEqZduJDoq3rAZhU5OgEE25bBbul4aC9BqLHAsM6H5ThZV4Di9axIHeby/MeG+dU2sWIe1YBxF8FeC89tZ9B8B4u4dpbTMarQKBgQC/yeH8uE3YgDiHRTrFRp3WmYGlGNTn+gZV0iRgXEXhvFIVTbI55nb3oMj8rsufM1EzhabkqeBa9gDoB75gg+6wghzH3M15IMYoHYsquhiux5mHnBvHrxTa9CB8QmZ1kqq2uxyghNpkhmjErTz0JMlLhb5K/KnJtbG8g/Ufz1bPgQKBgExT6iWxe6zP79iyUjHJ9pCAQaNrrQnIlmNs7fLRpZrG/gzsgNFvua50fV1qiRZ9vhXm/ngYsVHC0kcc02qxEMgof20cT746AUtGv0okp58lOUeXy/gqx66ECYa3Y9cbTcY5+78wy0sIPBwiXIj+JZR6FoNYsONVdLEK9aGJFS/NAoGAFdNXet2+ccTGAnQNJa5Vf/hoAK/qviAxOWf46mHZBUa8oxNl0FGYKYOxwhhtBurJUSkZ48jarOahbXS80CrK3UoX9g3Zqjh+sQXKkv/+tUhm63dBVSFiZC1Q2rC11bS3DE5Te8ahmzW02MWe0q1xCFySuW0QlX16Xf4G1sviCTM='),

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
