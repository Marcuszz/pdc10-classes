<?php

include "vendor/autoload.php";

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

$students = [
    "class_code",
    "student_number",
    "enrolled_at"

];

$template = $mustache->loadTemplate('class_rosters');
echo $template->render(compact('class_rosters'));