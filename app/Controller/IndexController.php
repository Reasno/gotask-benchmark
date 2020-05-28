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

use App\App as GoTask;
use App\PHPTask;
use Hyperf\HttpServer\Annotation\AutoController;

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
        return $task->hi('Reasno');
    }

    public function phpInsert(PHPTask $task)
    {
        return $task->insert(['random' => rand(1, 10000)]);
    }

    public function goInsert(GoTask $task)
    {
        return $task->insert(json_encode(['random' => rand(1, 10000)]));
    }

    public function phpFib(PHPTask $task)
    {
        return $task->fib(20);
    }

    public function goFib(GoTask $task)
    {
        return $task->fib(20);
    }

    public function phpBlocking(PHPTask $task){
        return $task->blocking();
    }

    public function goBlocking(GoTask $task){
        return $task->blocking( null);
    }
}
