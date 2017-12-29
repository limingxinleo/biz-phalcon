<?php
// +----------------------------------------------------------------------
// | 默认控制器 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
namespace App\Controllers;

class IndexController extends Controller
{
    /**
     * @desc
     * @author limx
     * @return bool|\Phalcon\Mvc\View
     * @Middleware('auth')
     */
    public function indexAction()
    {
        return $this->execute(
            new \App\Gate\Request\Index\IndexRequest(),
            new \App\Gate\Validator\Index\IndexValidator(),
            new \App\Gate\Business\Index\IndexBusiness(),
            new \App\Gate\Response\Index\IndexResponse()
        );
    }
}
