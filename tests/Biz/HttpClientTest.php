<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Biz;

use Tests\Biz\App\Common\HttpClient\TestClient;
use Tests\UnitTestCase;

/**
 * Class UnitTest
 */
class HttpClientTest extends UnitTestCase
{
    public function testBaseCase()
    {
        $res = TestClient::getInstance()->test();
        $this->assertTrue($res['success']);
        $this->assertEquals(1, $res['model']['body']['test_client']);
    }
}
