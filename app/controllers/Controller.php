<?php
// +----------------------------------------------------------------------
// | 控制器基类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Controllers;

use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\CodeException;
use App\Gate\Business\Business;
use App\Gate\Request\Request;
use App\Gate\Response\Response;
use App\Gate\Validator\Validator;

abstract class Controller extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
    }

    public function beforeExecuteRoute()
    {
        // 在每一个找到的动作前执行
    }

    public function afterExecuteRoute()
    {
        // 在每一个找到的动作后执行
    }

    /**
     * @desc   接口执行方法
     * @author limx
     * @param Request   $request
     * @param Validator $validator
     * @param Business  $business
     * @param Response  $response
     */
    public function execute(Request $request, Validator $validator, Business $business, Response $response)
    {
        $data = $request->handle();

        if ($validator->validate($data)->valid()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_REQUEST_ILLEGAL, $validator->getErrorMessage());
        }

        $result = $business->handle($data);

        return $response->handle($result);
    }
}
