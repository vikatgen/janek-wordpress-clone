<?php

class User extends DatabaseQuery
{
    public $id;
    public $email;
    public $password;
    public $tableName = 'users';


    public function info()
    {
        return $this->email . '(' . $this->id . ')';
    }
}
