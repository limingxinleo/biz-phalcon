<?php
// +----------------------------------------------------------------------
// | Response.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Gate\Response;

use Phalcon\Di\Injectable;
use App\Utils\Response as ResponseUtil;

abstract class Response extends Injectable
{
    public function handle(array $data)
    {
        return ResponseUtil::success($data);
    }
}
