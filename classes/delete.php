<?php

include ("init.php");
use Classes;

$id = $_GET['id'];
$student = new Classes('');
$student->setConnection($connection);
$student->getById($id);
$student->delete();
header("index.php");
exit();