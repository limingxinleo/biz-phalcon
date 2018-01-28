<?php
// +----------------------------------------------------------------------
// | Config 服务 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Core\Services;

use Phalcon\DI\FactoryDefault;
use Phalcon\Config;
use Xin\Phalcon\Config\Center\Client;

class ConfigService implements ServiceProviderInterface
{
    public function register(FactoryDefault $di, Config $config)
    {
        /**
         * Shared configuration service
         */
        $di->setShared('config', function () use ($config) {
            return $config;
        });

        /**
         * Shared Config Center Service
         */
        $di->setShared('configCenter', function () use ($config) {
            $configClient = Client::getInstance('configCenter');
            $centerPath = $config->application->configDir . 'center/';
            $configClient->load($centerPath);

            return $configClient;
        });
    }
}
