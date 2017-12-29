<?php
// +----------------------------------------------------------------------
// | Enum.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Biz;

use App\Common\Enums\ErrorCode;
use Tests\UnitTestCase;

/**
 * Class UnitTest
 */
class EnumTest extends UnitTestCase
{
    public function testGetMessage()
    {
        $code = ErrorCode::$ENUM_SYSTEM_ERROR;
        $this->assertEquals('系统错误', ErrorCode::getMessage($code));
    }
}
