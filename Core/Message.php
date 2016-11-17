<?php

namespace App\Core;

abstract class Message {

    const REGEX_DELIMITER = '#';

    /**
     * Message data
     *
     * @var array
     */
    protected $data;

    /**
     * Data field names
     *
     * @var array
     */
    protected $fields;

    /**
     * Data field regexes
     *
     * @var array
     */
    protected $fieldRegexes;

    /**
     * Returns true if the message field exists
     *
     * @param string $fieldName
     *
     * @return boolean
     */
    public function fieldExists($fieldName) {
        return array_search($fieldName, $this->fields) !== false;
    }

    /**
     * Returns message data
     *
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Returns the field regex
     *
     * @param string $fieldName
     *
     * @return string
     */
    public function getFieldRegex($fieldName) {
        if (!array_key_exists($fieldName, $this->fieldRegexes)) {
            // throw Exception
        }

        return $this->fieldRegexes[$fieldName];
    }

    /**
     * Returns message data field names
     *
     * @return array
     */
    public function getFields() {
        return $this->fields;
    }

    /**
     * Returns true if the given value is valid for the given message field, otherwise false.
     *
     * @param string $fieldName
     * @param string $value
     *
     * @return boolean
     */
    public function isValueValid($fieldName, $value) {
        $regex = self::REGEX_DELIMITER.$this->getFieldRegex($fieldName).self::REGEX_DELIMITER;

        return preg_match($regex, $value) === 1;
    }

    /**
     * Set value of the given message field.
     *
     * @param string $fieldName
     * @param string $value
     */
    public function setValue($fieldName, $value) {
        if ($this->fieldExists($fieldName) && $this->isValueValid($fieldName, $value)) {
            $this->data[$fieldName] = $value;
        }
        else {
            // throw Exception
        }
    }
}