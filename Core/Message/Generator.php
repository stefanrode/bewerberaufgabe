<?php

namespace App\Core\Message;

use App\Core\Message;

abstract class Generator {

    /**
     * Generates a message
     *
     * @param string $messageClass
     *
     * @return Message
     */
    public abstract function generate($messageClass);
}