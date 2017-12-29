<?php
// +----------------------------------------------------------------------
// | ZiMiClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Biz\App\Common\HttpClient;

use App\Biz\BizException;
use App\Biz\CodeException;
use App\Common\Enums\ErrorCode;
use App\Utils\Curl;
use App\Common\HttpClient\Client;

class TestClient extends Client
{
    public function test()
    {
        $route = '/api/request';
        $params = ['test_client' => 1];
        return $this->httpGet($route, $params);
    }

    public function getConfigName()
    {
        return 'test';
    }
}
