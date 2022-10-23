<?php

include ("../init.php");
use Models\Teacher;

$teacher= new Teacher('');
$teacher->setConnection($connection);
$all_teachers = $teacher->getAll();

$template = $mustache->loadTemplate('templates/Teacher/index.mustache');

echo $template->render(compact('list_teachers'));