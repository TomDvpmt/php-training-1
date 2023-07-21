<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="en">

<?php 

// define main paths
$rootDir = htmlspecialchars(($_SERVER["DOCUMENT_ROOT"]));
$modelDir = $rootDir . "/src/model/"; 
$viewDir = $rootDir . "/src/view/";
$ctrlDir = $rootDir . "/src/controllers/";
$utilsDir = $rootDir . "/src/utils/";

// load environment
require $rootDir . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// set up database
require_once $rootDir . "/src/model/Database.php";
(new Database)->setup();

// navigation routes
$request = htmlspecialchars($_SERVER["REQUEST_URI"]);

switch($request) {
    case "":
    case "/": 
        require_once $viewDir . "pages/home.php";
        break;
    case "/login": 
        require_once $ctrlDir . "login.php";
        break;
    case "/register": 
        require_once $ctrlDir . "register.php";
        break;
    default:
        http_response_code(404);
        require_once $viewDir . "pages/404.php";
        break;
}

?>

</body>
</html>