<?php
// +----------------------------------------------------------------------
// | ResponseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Biz\Utils;

use App\Utils\Response;
use Tests\UnitTestCase;

/**
 * Class UnitTest
 */
class ResponseTest extends UnitTestCase
{
    public function testGetCase()
    {
        $response = Response::success([
            'key' => 'val'
        ]);
        $json = $response->getContent();
        $this->assertJson($json);

        $data = json_decode($json, true);
        $this->assertTrue($data['success']);
        $this->assertEquals(['key' => 'val'], $data['model']);
    }
}
