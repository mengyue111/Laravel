<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * 从CSRF验证中 排除的URL
     * @var array
     */
    protected $except = [
        //
        'http://www.yuegege.me/file/upload',
    ];
}
