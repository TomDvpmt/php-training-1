<!DOCTYPE html>
<html lang="en">

<?php 

$request = htmlspecialchars($_SERVER["REQUEST_URI"]);
$viewDir = "./src/view/";
$ctrlDir = "./src/controllers/";

switch($request) {
    case "":
    case "/": 
        require $ctrlDir . "home.php";
        break;
    case "/login": 
        require $ctrlDir . "login.php";
        break;
    case "/register": 
        require $ctrlDir . "register.php";
        break;
    default:
        http_response_code(404);
        require $viewDir . "pages/404.php";
        break;
}

?>

</body>
</html>