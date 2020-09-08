<?php

$config = require_once 'config.php';

require_once 'model/Database.php';
$db = (new Database($config))->connection();

require_once 'model/User.php';