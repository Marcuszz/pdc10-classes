<?php

include "vendor/autoload.php";
include "config/database.php";

use app\UsePdo;
use Models\ClassRecord;
use Models\Teacher;
use Models\Student;

$connObj = new Connection($host, $database, $user, $password);
$connection = $connObj->connect();

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);