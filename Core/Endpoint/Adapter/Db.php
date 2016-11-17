<?php

namespace App\Core\Endpoint\Adapter;

use App\Core\Endpoint\Adapter;
use App\Core\Message;

class Db extends Adapter {

    /**
     * Name of the database
     *
     * @var string
     */
    protected $database;

    public function __construct($database) {
        $this->database = $database;
    }

    /**
     * @param Message $message
     */
    public function sendMessage(Message $message) {
        $messageData = $message->getData();

        // the class name is also the table name in the database
        $messageClass = get_class($message);
        $tableName = substr($messageClass, strrpos($messageClass, '\\')+1);

        // insert message data into database with auto increment
        $sql = "
            INSERT INTO `".$this->database."`.`$tableName` (id, ".implode(', ', array_keys($messageData)).") VALUES (NULL, ...)
        ";

        // execute query

        echo "db insert into table: ".$this->database.'.'.$tableName. " params: ".json_encode($messageData)."\n";
    }
}