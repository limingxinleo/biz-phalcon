<?php
// +----------------------------------------------------------------------
// | Request.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Utils;

class Request
{
    public static function get($name = null, $default = null)
    {
        /** @var \Phalcon\Http\Request|\Phalcon\Http\RequestInterface $request */
        $request = di('request');
        if (isset($name)) {
            $val = $request->get($name);
            if (isset($val)) {
                return $val;
            }
            $json = $request->getJsonRawBody(true);
            if (isset($json[$name])) {
                return $json[$name];
            }
            return $default;
        }
        $data = $request->get();
        $json = $request->getJsonRawBody(true) ?? [];

        return array_merge($data, $json);
    }
}
