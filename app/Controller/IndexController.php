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

use App\phpTask;
use Hyperf\HttpServer\Annotation\AutoController;
use Reasno\GoTask\GoTask;
use Spiral\Goridge\RelayInterface as Relay;

/**
 * Class IndexController
 * @package App\Controller
 * @AutoController()
 */
class IndexController extends AbstractController
{
    public function phpHi(phpTask $task)
    {
        return $task->hi('Reasno');
    }

    public function goHi(GoTask $task)
    {
        return $task->call('App.Hi', 'Reasno');
    }

    public function phpInsert(phpTask $task)
    {
        return $task->insert(['random' => rand(1, 10000)]);
    }

    public function goInsert(goTask $task)
    {
        return $task->call('App.Insert', json_encode(['random' => rand(1, 10000)]), RELAY::PAYLOAD_RAW);
    }

    public function goInsert2(goTask $task)
    {
        return $task->call('App.Insert2', ['random' => rand(1, 10000)]);
    }
}
