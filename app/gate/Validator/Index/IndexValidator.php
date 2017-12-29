<?php
// +----------------------------------------------------------------------
// | IndexValidator.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Gate\Validator\Index;

use App\Gate\Validator\Validator;

class IndexValidator extends Validator
{
    public function initialize()
    {
        $this->add(
            [
                'name'
            ],
            new \Phalcon\Validation\Validator\PresenceOf([
                'message' => 'The :field is required',
            ])
        );
    }
}
