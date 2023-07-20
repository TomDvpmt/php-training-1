<!DOCTYPE html>
<html lang="en">

<?php 


// define main paths
$root_dir = htmlspecialchars(($_SERVER["DOCUMENT_ROOT"]));
$model_dir = $root_dir . "/src/model/"; 
$view_dir = $root_dir . "/src/view/";
$ctrl_dir = $root_dir . "/src/controllers/";

// load environment
require $root_dir . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// set up database
require_once $root_dir . "/src/model/Database.php";
(new Database)->setup();

// navigation routes
$request = htmlspecialchars($_SERVER["REQUEST_URI"]);

switch($request) {
    case "":
    case "/": 
        require_once $view_dir . "pages/home.php";
        break;
    case "/login": 
        require_once $ctrl_dir . "login.php";
        break;
    case "/register": 
        require_once $ctrl_dir . "register.php";
        break;
    default:
        http_response_code(404);
        require_once $view_dir . "pages/404.php";
        break;
}

?>

</body>
</html>