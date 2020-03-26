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

return [
    'enable' => true,
    'executable' => BASE_PATH . '/bin/app',
    'socket_address' => value(function () {
        $appName = env('APP_NAME');
        $socketName = $appName . uniqid();
        return "/tmp/{$socketName}.sock";
    }),
    'pool' => [
        'min_connections' => 1,
        'max_connections' => 100,
        'connect_timeout' => 10.0,
        'wait_timeout' => 3.0,
        'heartbeat' => -1,
        'max_idle_time' => (float) env('GOTASK_MAX_IDLE_TIME', 60),
    ],
];
