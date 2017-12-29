<?php
// +----------------------------------------------------------------------
// | Client.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\HttpClient;

use App\Common\Enums\ErrorCode;
use App\Utils\Curl;
use Xin\Traits\Common\InstanceTrait;

abstract class Client
{
    use InstanceTrait;

    abstract public function getConfigName();

    public function getHost()
    {
        $env = di('config')->env;
        $config = di('app')->api->toArray();
        if (empty($config[$env])) {
            throw new \Exception('API环境配置不存在', ErrorCode::$ENUM_SYSTEM_API_CONFIG_NOT_EXIST);
        }

        $name = $this->getConfigName();

        if (empty($name) || !isset($config[$env][$name])) {
            throw new \Exception('API环境配置不存在', ErrorCode::$ENUM_SYSTEM_API_CONFIG_NOT_EXIST);
        }

        return $config[$env][$name];
    }

    public function httpJson($route, $params = [])
    {
        $host = $this->getHost();
        $res = Curl::json($host . $route, $params);

        return $res;
    }

    public function httpGet($route, $params = [])
    {
        $host = $this->getHost();
        $res = Curl::get($host . $route, $params);

        return $res;
    }
}
