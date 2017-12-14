<?php
// +----------------------------------------------------------------------
// | ERROR 控制器 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
namespace App\Controllers;

use App\Common\Enums\ErrorCode;
use App\Utils\Response;

class ErrorController extends \Phalcon\Mvc\Controller
{

    /**
     * @desc   404
     * @author limx
     * @return bool|\Phalcon\Mvc\View
     */
    public function show404Action()
    {
        if ($this->request->isPost()) {
            return Response::fail(ErrorCode::$ENUM_SYSTEM_ERROR);
        }
        return $this->view->render('public', '404');
    }

    /**
     * @desc   View方式返回错误
     * @author limx
     * @param string $code
     * @param string $msg
     * @return bool|\Phalcon\Mvc\View
     */
    public function indexAction($code = '500', $msg = '出错了')
    {
        $this->view->code = $code;
        $this->view->msg = $msg;
        return $this->view->render('public', 'error');
    }

    /**
     * @desc   json方式返回错误
     *         用于dispatcher->forward()截断http请求
     * @author limx
     * @param int    $status
     * @param string $msg
     * @return mixed
     */
    public function jsonAction($status = 0, $msg = "")
    {
        return Response::fail(ErrorCode::$ENUM_SYSTEM_ERROR, $msg);
    }
}