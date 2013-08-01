<?php


abstract class Validator {
    function setValue($value) {
        $this->value = $value;
    }

    function setKey($key) {
        $this->key = $key;
    }

    function setConf($conf) {
        $this->conf = $conf;
    }

    abstract public function check();

    function isValid() {
        try {
            $this->check();
            return true;
        } catch (InvalidException $e) {
            return false;
        }
    }

    protected    function throwException($msg, $constraint) {
        $exception = new InvalidException($msg);
        $exception->setFieldName($this->key);
        $exception->setConstraintFailed($constraint);
        throw $exception;
    }
}