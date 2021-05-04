<?php

require_once __DIR__ . '/vendor/autoload.php';

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controllerName = sprintf("%sController", $controller);
$directory = __DIR__ . "/app/controllers/$controllerName.php";

if (!file_exists($directory)) {
    die("Page does not exist");
}

$controllerNameSpace = "\\app\\controllers\\" . $controllerName;
$controllerInstance = new $controllerNameSpace();

if (method_exists($controllerInstance, $action)) {
    $content = $controllerInstance->$action();
} else {
    header('Location: /');
    exit;
}
include_once __DIR__ . '/app/views/_layout.php';
