<?php

declare(strict_types=1);

namespace App;

use Hyperf\GoTask\GoTask;
use Hyperf\GoTask\GoTaskProxy;

class App extends GoTaskProxy
{
    /**
     * @param  $payload
     * @return mixed
     */
    public function blocking($payload)
    {
        return parent::call("App.Blocking", $payload, 0);
    }

    /**
     * @param int $payload
     * @return int
     */
    public function fib(int $payload) : int
    {
        return (int)parent::call("App.Fib", $payload, 0);
    }

    /**
     * @param  $payload
     * @return mixed
     */
    public function hi($payload)
    {
        return parent::call("App.Hi", $payload, 0);
    }

    /**
     * @param string $payload
     * @return mixed
     */
    public function insert(string $payload)
    {
        return parent::call("App.Insert", $payload, GoTask::PAYLOAD_RAW);
    }
}