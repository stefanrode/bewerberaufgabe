<?php

namespace App\Core;

use App\Core\Endpoint\Adapter\Api;
use App\Core\Endpoint\Adapter\Composite;
use App\Core\Endpoint\Adapter\Db;
use App\Core\Message\Generator\Random;

class Simulator {
    public function run() {
        // Load some config here.
        // The config should for example contain the concrete message class, the needed endpoint adapters and the concrete random message generator.


        $defaultMessageData = array(
            'forkliftId' => '12345678',
        );

        // choose random message generator as message generator
        $messageGenerator = new Random($defaultMessageData);


        // create two endpoint adapters
        // the messages are sent to the imaginary database and an HTTP API
        $endpointAdapterDb  = new Db('dbname');
        $endpointAdapterApi = new Api('https://apiurl.com');

        // add endpoint adapters to a composite adapter to make it transparent to which the messages are sent
        $endpointAdapter = new Composite();
        $endpointAdapter->addAdapter($endpointAdapterDb)
                        ->addAdapter($endpointAdapterApi);

        $messageClass = 'App\Core\Message\Usage';


        // in the prototype I just generate 10 messages to show how it works
        for($i = 0; $i < 10; $i++) {

            // first generate a message
            $message = $messageGenerator->generate($messageClass);

            // then send to the endpoint adapter
            $endpointAdapter->sendMessage($message);
        }

    }
}