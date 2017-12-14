<?php
// +----------------------------------------------------------------------
// | 默认控制器 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lmx0536.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <http://www.lmx0536.cn>
// +----------------------------------------------------------------------
namespace App\Controllers;

use App\Gate\Business\Index\IndexBusiness;
use App\Gate\Request\Index\IndexRequest;
use App\Gate\Response\Index\IndexResponse;
use App\Gate\Validator\Index\IndexValidator;

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
        // return $request;
        return $this->execute(new IndexRequest(), new IndexValidator(), new IndexBusiness(), new IndexResponse());
    }
}