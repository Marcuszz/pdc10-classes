<?php

include "init.php";
use ClassRoster;

$template = $mustache->loadTemplate('templates/ClassRoster/edit.mustache');
echo $template->render();

try {
if (isset($_POST['name'])) {

    $class->update($class_input['id'], $_POST['class_code'], $_POST['student_number'], $_POST['enrolled_at']); 
    header("index.php");
    exit();
    }
}
catch (Exception $e) {
    error_log($e->getMessage());
}