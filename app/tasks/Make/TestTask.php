<?php

namespace App\Tasks\Make;

use App\Tasks\Task;
use Xin\Cli\Color;
use Xin\Phalcon\Cli\Traits\Input;
use Xin\Support\File;

class TestTask extends Task
{
    use Input;

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  新建Gate层脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run make:test@[action] class=className --force', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  test         新建单元测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function testAction()
    {
        $class = $this->argument('class');
        if ($class === null) {
            echo Color::error('请输入类名！') . PHP_EOL;
            return;
        }

        $arr = explode('\\', $class);
        $class = array_pop($arr);
        $namespace = implode('\\', $arr);
        if (!empty($namespace)) {
            $namespace = '\\' . $namespace;
        }
        $dir = ROOT_PATH . '/tests/Unit/' . implode('/', $arr);
        $file = $class . '.php';

        if (!is_dir($dir)) {
            File::getInstance()->makeDirectory($dir, 0777, true);
        }

        if (file_exists($dir . '/' . $file) && !$this->option('force')) {
            echo Color::error('文件已存在！') . PHP_EOL;
            return;
        }

        $template = "<?php
namespace Tests\Unit$namespace;

use \UnitTestCase;

class %s extends UnitTestCase
{

}";

        $data = sprintf($template, $class);
        file_put_contents($dir . '/' . $file, $data);
        echo Color::success('文件新建成功！') . PHP_EOL;
    }
}
