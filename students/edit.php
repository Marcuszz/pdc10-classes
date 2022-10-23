<?php

include "init.php";
use Student;

$template = $mustache->loadTemplate('templates/Student/edit.mustache');
echo $template->render();

try {
if (isset($_POST['name'])) {

    $class->update($class_input['id'], $_POST['first_name'],  $_POST['last_name'], $_POST['email'], $_POST['contact_number'],  $_POST['program']); 
    header("index.php");
    exit();
    }
}
catch (Exception $e) {
    error_log($e->getMessage());
}