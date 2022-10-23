<?php

include ("init.php");
use Student;

$id = $_GET['id'];
$roster = new Student('');
$roster->setConnection($connection);
$roster->getById($id);
$roster->delete();
header("index.php");
exit();