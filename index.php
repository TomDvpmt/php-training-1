<?php declare(strict_types=1);

use Dotenv\Dotenv;
use PhpTraining\Models\Database;
use PhpTraining\Controllers\Register;

// define main paths
$rootDir = htmlspecialchars(($_SERVER["DOCUMENT_ROOT"]));
$modelsDir = $rootDir . "/src/models/"; 
$viewsDir = $rootDir . "/src/views/";
$ctrlDir = $rootDir . "/src/controllers/";
$utilsDir = $rootDir . "/src/utils/";

// load environment
require_once $rootDir . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// require classes
require_once $ctrlDir . "Register.php";
require_once $modelsDir . "Database.php";

// set up database
(new Database)->setup();

 ?>

<!DOCTYPE html>
<html lang="en">

<?php 

// routes
$request = htmlspecialchars($_SERVER["REQUEST_URI"]);

switch($request) {
    case "":
    case "/": 
        require_once $viewsDir . "pages/home.php";
        break;
    case "/login": 
        require_once $ctrlDir . "login.php";
        break;
    case "/register": 
        $register = new Register;
        $registerInfo = $register->submit();
        $registerErrors = $registerInfo["errors"];
        if(isset($registerErrors)) {
            require_once $viewsDir . "pages/register.php";
        }
        break;
    default:
        http_response_code(404);
        require_once $viewsDir . "pages/404.php";
        break;
}

?>

</body>
</html>