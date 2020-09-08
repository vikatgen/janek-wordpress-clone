<?php

class User {

    public $id;
    public $email;
    public $password;

    public function info () {
        return $this->email . '(' . $this->id . ')';
    }
}