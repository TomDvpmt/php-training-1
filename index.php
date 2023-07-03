<?php 

declare(strict_types=1);

$request = htmlspecialchars($_SERVER["REQUEST_URI"]);
$viewDir = "/templates/";
$ctrlDir = "/src/controllers/";

switch($request) {
    case "":
    case "/": 
        require __DIR__ . $ctrlDir . "home.php";
        break;
    case "/login": 
        require __DIR__ . $ctrlDir . "login.php";
        break;
    case "/register": 
        require __DIR__ . $ctrlDir . "register.php";
        break;
    default:
    http_response_code(404);
    require __DIR__ . $viewDir . "404.php";
    break;
}