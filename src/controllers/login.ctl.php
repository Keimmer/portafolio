<?php

if (isset($_POST["submit"])) {
    $userName = $_POST["username"];    
    $password = $_POST["password"];

    require_once 'dbh.ctl.php';
    require_once 'operations.ctl.php';
    $ops = new DbController;

    if ($ops->emptyInputLogin($userName, $password) !== false){
        header("location: /Portafolio/src/views/login.php?error=emptyinput");
        exit();
    }

    $ops->loginUser(new DbConnection, $userName, $password);
} else {
    header("location: /Portafolio/src/views/login.php");
    exit();
}