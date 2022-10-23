<?php

include ("init.php");
use classes;


$template = $mustache->loadTemplate('template/Class/add.mustache');
echo $template->render();

try {
    if (isset($_POST['name'])) {
        $addClasses = new Classes($_POST['first_name'],$_POST['last_name'], $_POST['description'], $_POST['assigned_teacher'], $_POST['class_code']);
        $addClasses->setConnection($connection);
        $addClasses->saveClasses();
        header('index.php');
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}