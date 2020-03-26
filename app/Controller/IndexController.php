<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\PHPTask;
use Hyperf\HttpServer\Annotation\AutoController;
use Reasno\GoTask\GoTask;
use Spiral\Goridge\RelayInterface as Relay;

/**
 * Class IndexController.
 * @AutoController
 */
class IndexController extends AbstractController
{
    public function phpHi(PHPTask $task)
    {
        return $task->hi('Reasno');
    }

    public function goHi(GoTask $task)
    {
        return $task->call('App.Hi', 'Reasno');
    }

    public function phpInsert(PHPTask $task)
    {
        return $task->insert(['random' => rand(1, 10000)]);
    }

    public function goInsert(GoTask $task)
    {
        return $task->call('App.Insert', json_encode(['random' => rand(1, 10000)]), RELAY::PAYLOAD_RAW);
    }

    public function goFib(GoTask $task)
    {
        return $task->call('App.Fib', 10);
    }

    public function phpFib(PHPTask $task)
    {
        return $task->fib(10);
    }

    public function goBlocking(GoTask $task){
        return $task->call('App.Blocking', null);
    }

    public function phpBlocking(PHPTask $task){
        return $task->blocking();
    }
}
