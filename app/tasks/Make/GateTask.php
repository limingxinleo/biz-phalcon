<?php

namespace App\Tasks\Make;

use App\Tasks\Task;
use Phalcon\Text;
use Xin\Cli\Color;
use Xin\Phalcon\Cli\Traits\Input;
use Xin\Support\File;

class GateTask extends Task
{
    use Input;

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  新建Gate层脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run make:gate@[action] class=className --force', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  request         新建Request', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  validator       新建Validator', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  business        新建Business', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  response        新建Response', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  all             新建所有', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function __call($name, $arguments)
    {
        $type = str_replace('Action', '', $name);
        if ($type === 'all') {
            $this->execute('Request');
            $this->execute('Validator');
            $this->execute('Business');
            $this->execute('Response');
        } else {
            $this->execute(Text::camelize($type));
        }
    }

    public function execute($type)
    {
        $class = $this->argument('class');
        if ($class === null) {
            echo Color::error('请输入类名！') . PHP_EOL;
            return;
        }

        $arr = explode('\\', $class);
        $class = array_pop($arr) . $type;
        $namespace = implode('\\', $arr);
        $dir = APP_PATH . '/gate/' . $type . '/' . implode('/', $arr);
        $file = $class . '.php';

        if (!is_dir($dir)) {
            File::getInstance()->makeDirectory($dir, 0777, true);
        }

        if (file_exists($dir . '/' . $file) && !$this->option('force')) {
            echo Color::error('文件已存在！') . PHP_EOL;
            return;
        }

        $template = "<?php
namespace App\Gate\\$type\\%s;

use App\Gate\\$type\\$type;

class %s extends $type
{

}";

        $data = sprintf($template, $namespace, $class);
        file_put_contents($dir . '/' . $file, $data);
        echo Color::success('文件新建成功！') . PHP_EOL;
    }
}
