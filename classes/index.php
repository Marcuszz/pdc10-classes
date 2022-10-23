<?php

include ("init.php");
use Classes;

$class= new Classes('');
$class->setConnection($connection);
$all_classes = $class->getAll();

$template = $mustache->loadTemplate('classes/index.mustache');
//all classes
echo $template->render(compact('list_classes'));