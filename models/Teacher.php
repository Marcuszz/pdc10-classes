<?php

include "vendor/autoload.php";

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

$teachers = [
    "last_name",
    "first_name",
    "email",
    "employee_number",
    "class_code"	


];

$template = $mustache->loadTemplate('teachers');
echo $template->render(compact('teachers'));