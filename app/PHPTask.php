<?php

declare(strict_types=1);

namespace App;

use Hyperf\Task\Annotation\Task;
use MongoDB\Client;
use MongoDB\Driver\Manager;

class PHPTask
{
    private $client;

    /**
     * @Task
     */
    public function hi(string $name)
    {
        return "Hello, $name!";
    }

    /**
     * @Task
     */
    public function insert(array $document)
    {
        $collection = $this->client()->testing->numbers;
        $insertOneResult = $collection->insertOne($document);
        return $insertOneResult->getInsertedId();
    }

    protected function client()
    {
        if ($this->client instanceof Client) {
            return $this->client;
        }
        return $this->client = new Client;
    }
}
