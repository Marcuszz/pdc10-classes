<?php

include ("init.php");
use Teacher;

$id = $_GET['id'];
$roster = new Teacher('');
$roster->setConnection($connection);
$roster->getById($id);
$roster->delete();
header("index.php");
exit();