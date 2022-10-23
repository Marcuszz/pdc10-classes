<?php

include ("init.php");
use ClassRoster;

$classRoster= new ClassRoster('');
$classRoster->setConnection($connection);
$all_ClassRosters = $classRoster->getAll();
$template = $mustache->loadTemplate('templates/class-roster/index');
//all class-roster
echo $template->render(compact('list_class-roster'));