<?php

include ("init.php");
use ClassRoster;

$template = $mustache->loadTemplate('templates/ClassRoster/add.mustache');
echo $template->render();

try {
    if (isset($_POST['name'])) {
        $addRoster = new ClassRoster($_POST['class_code'], $_POST['student_number'], $_POST['enrolled_at']);
        $addRoster->setConnection($connection);
        $addRoster->saveRoster();
        header('index.php');
    }
}

catch (Exception $e) {
    error_log($e->getMessage());
}