<?php
// +----------------------------------------------------------------------
// | Business.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Gate\Business;

use Phalcon\Di\Injectable;

abstract class Business extends Injectable
{
    abstract public function handle(array $data);
}
