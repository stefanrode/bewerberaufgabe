<?php

namespace App\Core\Message;

use App\Core\Message;

class Usage extends Message {
    /**
     * @var array
     */
    protected $fields = array(
        'forkliftId',
        'forkliftDriverId',
        'start',
        'end',
    );

    /**
     * @var array
     */
    protected $fieldRegexes = array(
        'forkliftId'       => '^[A-Z0-9]{8}$',
        'forkliftDriverId' => '^[A-Z0-9]{14}$',
        'start'            => '^\d{4}\-([0]{1}[1-9]{1}|[1]{1}[0-2]{1})\-([0-2]{1}\d{1}|[3]{1}[0-1]{1}) ([0-1]{1}\d{1}|[2]{1}[0-3]{1}):([0-5]{1}\d{1}):([0-5]{1}\d{1})$',
        'end'              => '^\d{4}\-([0]{1}[1-9]{1}|[1]{1}[0-2]{1})\-([0-2]{1}\d{1}|[3]{1}[0-1]{1}) ([0-1]{1}\d{1}|[2]{1}[0-3]{1}):([0-5]{1}\d{1}):([0-5]{1}\d{1})$',
    );
}