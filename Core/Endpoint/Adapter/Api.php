<?php

namespace App\Core\Endpoint\Adapter;

use App\Core\Endpoint\Adapter;
use App\Core\Message;

class Api extends Adapter {

    /**
     * API URL
     *
     * @var string
     */
    protected $url;

    public function __construct($url) {
        $this->url = $url;
    }

    /**
     * @param Message $message
     */
    public function sendMessage(Message $message) {
        $messageData = $message->getData();

        // call API, for example with cURL and send message data as params

        echo "cUrl: ".$this->url. " params: ".json_encode($messageData)."\n";
    }
}