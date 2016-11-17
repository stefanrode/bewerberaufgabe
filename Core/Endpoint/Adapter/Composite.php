<?php

namespace App\Core\Endpoint\Adapter;

use App\Core\Endpoint\Adapter;
use App\Core\Message;

class Composite extends Adapter {

    /**
     * List of adapters
     *
     * @var array
     */
    protected $adapters;

    /**
     * Add adapter to list
     *
     * @param Adapter $adapter
     *
     * @return Composite
     */
    public function addAdapter(Adapter $adapter) {
        $this->adapters[] = $adapter;

        return $this;
    }

    /**
     * @param Message $message
     */
    public function sendMessage(Message $message) {
        foreach ($this->adapters as $adapter) { /** @var Adapter $adapter */
            $adapter->sendMessage($message);
        }
    }
}