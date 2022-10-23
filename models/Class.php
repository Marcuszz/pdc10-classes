<?php

include "vendor/autoload.php";

$mustache = new Mustache_Engine([
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates')
]);

$classes = [
    "first_name",
    "last_name",
    "description",
    "assigned_teacher",
    "class_code"

];

$template = $mustache->loadTemplate('template/Classes/index');
echo $template->render(compact('list_classes'));