<?php

namespace App;

class Login
{
    private $inputToken;
    private const TOKEN = 'OuPbRImoYvAxw+Un04dJ3?75GBk9M1'; //access token

    public function setToken(string $inputToken)
    {
        $this->inputToken = htmlentities($inputToken, ENT_QUOTES);
    }

    public function getToken(): string
    {
        return $this->inputToken;
    }

    public function login()
    {
        if ($this->getToken() == self::TOKEN) {
            $_SESSION['logged'] = true;
            return header('Location: panel.php');
        } else {
            unset($_SESSION['logged']);
            return header('Location: index.php');
        }
    }
}
