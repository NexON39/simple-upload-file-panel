<?php

namespace App;

class Core
{
    public function __construct()
    {
        return session_start();
    }

    public function checkIfLogged()
    {
        if (!(isset($_SESSION['logged']) && $_SESSION['logged'] == true)) {
            header('Location: index.php');
        }
    }

    public function checkIfLoggedOnIndex()
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            header('Location: panel.php');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}
