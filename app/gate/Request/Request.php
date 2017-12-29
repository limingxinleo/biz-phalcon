<?php
// +----------------------------------------------------------------------
// | Request.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Gate\Request;

use Phalcon\Di\Injectable;
use App\Utils\Request as RequestUtil;

abstract class Request extends Injectable
{
    public function handle()
    {
        return RequestUtil::get();
    }
}
