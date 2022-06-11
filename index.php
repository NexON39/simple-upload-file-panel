<?php
require_once('app/Core_Class.php');
require_once('app/Login_Class.php');

use App\Core;
use App\Login;

$core = new Core;
$core->checkIfLoggedOnIndex();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <div class="container">
        <form action="index.php" method="POST">
            <div><input type="password" placeholder="access token" name="token"></div>
            <div><input type="submit" value="Log in" name="loginBtn"></div>
        </form>
        <?php
        if (isset($_POST['loginBtn'])) {
            $login = new Login;
            $login->setToken($_POST['token']);
            $login->login();
        }
        ?>
    </div>

</body>

</html>