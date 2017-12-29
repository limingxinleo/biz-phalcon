<?php
// +----------------------------------------------------------------------
// | IndexBusiness.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Gate\Business\Index;

use App\Core\System;
use App\Gate\Business\Business;

class IndexBusiness extends Business
{
    public function handle(array $data)
    {
        return [
            'welcome' => $data['name'],
            'version' => System::getInstance()->version(),
            'message' => "You're now flying with Phalcon. Great things are about to happen!",
        ];
    }
}
