<?php

include ("init.php");
use Models\Student;

$student= new Student('');
$student->setConnection($connection);
$all_students = $student->getAll();

$template = $mustache->loadTemplate('students/index.mustache');
//all students
echo $template->render(compact('list_students'));