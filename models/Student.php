<?php

include "vendor/autoload.php";

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

$students = [
    "first_name",
    "last_name",
    "student_number",
    "email",
    "contact_number",
    "program"

];

$template = $mustache->loadTemplate('students');
echo $template->render(compact('students'));