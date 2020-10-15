<?php

class User extends DatabaseQuery
{
    public $id;
    public $email;
    public $password;
    public static $tableName = 'users';
    public static $className = 'User';


    public function info()
    {
        return $this->email . '(' . $this->id . ')';
    }
}
