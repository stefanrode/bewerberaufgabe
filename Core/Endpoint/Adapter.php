<?php

namespace App\Core\Endpoint;

use App\Core\Message;

abstract class Adapter {

    /**
     * Sends the given message to the endpoint
     *
     * @param Message $message
     */
    public abstract function sendMessage(Message $message);
}