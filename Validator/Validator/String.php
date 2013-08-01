<?php

namespace Validator;

class Validator_String extends Validator {
    function check() {
        $val = (string) $this->value;
        if(isset($this->conf['min_lenght']) && (strlen($val) < $this->conf['min_lenght'])) {
            $this->throwException($this->key . ' must be at least ' . $this->conf['min_lenght'] . ' characters', 'min_lenght');
        }
        if(isset($this->conf['max_lenght']) && (strlen($val) > $this->conf['max_lenght'])) {
            $this->throwException($this->key . ' must be less than ' . $this->conf['max_lenght'] . ' characters', 'max_lenght');
        }
        if(isset($this->conf['regexp']) && 
            (filter_var($val, FILTER_VALIDATE_REGEXP, 
                array("options"=>array("regexp"=>$this->conf['regexp']))) === false)) {
            $this->throwException($this->key . ' is invalid: ' . $this->conf['regexp'], 'regexp');
        }
    }
}