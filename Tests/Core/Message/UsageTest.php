<?php

namespace App\Tests\Core\Message;

use App\Core\Message\Usage;

class UsageTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Usage
     */
    protected $message;

    public function setUp() {
        $this->message = new Usage();
    }

    /**
     * @dataProvider getFields
     */
    public function testFieldExists($fieldName, $expected) {
        $this->assertEquals($expected, $this->message->fieldExists($fieldName));
    }

    public function getFields() {
        return array(
            array('forkliftId', true),
            array('forkliftDriverId', true),
            array('start', true),
            array('end', true),
            array('forklift', false),
        );
    }


    /**
     * @dataProvider getFieldValues
     */
    public function testIsValueValid($fieldName, $value, $expected) {
        $this->assertEquals($expected, $this->message->isValueValid($fieldName, $value));
    }

    public function getFieldValues() {
        return array(
            array('forkliftId', 'AAAAAAAA', true),
            array('forkliftId', '11111111', true),
            array('forkliftId', '1111AAAA', true),
            array('forkliftId', '12345678', true),
            array('forkliftId', 'ABCDEFGH', true),
            array('forkliftId', 'AAAAAAA', false),
            array('forkliftId', 'AAAAAAAAA', false),
            array('forkliftId', 'aaaaaaaa', false),

            array('forkliftDriverId', 'AAAAAAAAAAAAAA', true),
            array('forkliftDriverId', '11111111111111', true),
            array('forkliftDriverId', '1111111AAAAAAA', true),
            array('forkliftDriverId', 'AAAAAAAAAAAAA', false),
            array('forkliftDriverId', 'AAAAAAAAAAAAAAA', false),
            array('forkliftDriverId', 'aaaaaaaaaaaaaa', false),
        );
    }
}