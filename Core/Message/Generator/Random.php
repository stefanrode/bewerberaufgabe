<?php

namespace App\Core\Message\Generator;

use App\Core\Message;
use App\Core\Message\Generator;
use App\Core\String\Generator\Pattern;

class Random extends Generator {

    /**
     * Default message data
     *
     * @var array
     */
    protected $defaultData;

    public function __construct(array $defaultData = array()) {
        $this->defaultData = $defaultData;
    }

    /**
     * @return Message
     */
    public function generate($messageClass) {
        $message = new $messageClass(); /** @var $message Message */

        foreach ($message->getFields() as $fieldName) {
            if (array_key_exists($fieldName, $this->defaultData)) {
                $message->setValue($fieldName, $this->defaultData[$fieldName]);
            }
            else {
                $regex = $message->getFieldRegex($fieldName);

                $gen = new Pattern($regex);

                $message->setValue($fieldName, $gen->generate());
            }
        }

        return $message;
    }
}