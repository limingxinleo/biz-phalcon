<?php
// +----------------------------------------------------------------------
// | ExceptionTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Biz;

use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\CodeException;
use Tests\UnitTestCase;

/**
 * Class UnitTest
 */
class ExceptionTest extends UnitTestCase
{
    public function testThrowCodeException()
    {
        $code = ErrorCode::$ENUM_SYSTEM_ERROR;
        try {
            throw new CodeException($code);
        } catch (\Exception $ex) {
            $this->assertEquals('系统错误', $ex->getMessage());
            $this->assertEquals($code, $ex->getCode());
        }
    }

    public function testThrowCodeExceptionWithMessage()
    {
        $code = ErrorCode::$ENUM_SYSTEM_ERROR;
        try {
            throw new CodeException($code, 'System Error');
        } catch (\Exception $ex) {
            $this->assertEquals('System Error', $ex->getMessage());
            $this->assertEquals($code, $ex->getCode());
        }
    }
}
