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

namespace App;

use Hyperf\Task\Annotation\Task;
use MongoDB\Client;

class PHPTask
{
    private $client;

    /**
     * @Task
     */
    public function hi(string $name)
    {
        return "Hello, {$name}!";
    }

    /**
     * @Task
     */
    public function insert(array $document)
    {
        $collection = $this->client()->testing->numbers;
        $documents = array_fill(0, 100, $document);
        $res = $collection->insertMany($documents);
        return $res->getInsertedIds();
    }

    /**
     * @Task
     */
    public function fib(int $number)
    {
        if ($number == 0) {
            return 0;
        }
        if ($number == 1) {
            return 1;
        }
        // Recursive Call to get the upcoming numbers
        return $this->fib($number - 1) +
                    $this->fib($number - 2);
    }

    /**
     * @Task
     */
    public function blocking()
    {
        usleep(1000 * 100);
        return 'ok';
    }

    protected function client()
    {
        if ($this->client instanceof Client) {
            return $this->client;
        }
        return $this->client = new Client();
    }
}
