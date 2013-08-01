<?php

namespace Validator;

class Validator_Email extends Validator {
    function check() {
        $val = (string) $this->value;
        if (filter_var($val, FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE) === null) {
            $this->throwException($this->key . ' is a invalid email', 'email');
        }
    }
}