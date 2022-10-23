<?php

include "init.php";
use Teacher;

$template = $mustache->loadTemplate('templates/Teacher/edit');
echo $template->render();

try {
if (isset($_POST['name'])) {

    $class->update($class_input['id'], $_POST['first_name'],  $_POST['last_name'], $_POST['email'], $_POST['employee_number'],  $_POST['class_code']); 
    header("index.php");
    exit();
    }
}
catch (Exception $e) {
    error_log($e->getMessage());
}