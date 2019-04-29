<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 支付宝 服务端回调
        'payment/alipay/notify',
        // 微信 服务端回调
        'payment/wechat/notify',
        // 微信 退款回调
        'payment/wechat/refund_notify',
    ];
}
