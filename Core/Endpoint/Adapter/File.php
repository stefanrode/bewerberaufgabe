<?php

namespace App\Core\Endpoint\Adapter;

use App\Core\Endpoint\Adapter;
use App\Core\Message;

class File extends Adapter {

    /**
     * Name of the file
     *
     * @var string
     */
    protected $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    /**
     * @param Message $message
     */
    public function sendMessage(Message $message) {
        $messageData = $message->getData();

        // write message data to file
    }
}