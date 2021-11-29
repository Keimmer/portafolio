<?php

if (isset($_POST["submit"])) {
    $userName = $_POST["username"];
    $name = $_POST["name"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $gender = $_POST["genero"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

    require_once 'dbh.ctl.php';
    require_once 'operations.ctl.php';
    $ops = new DbController;

    if ($ops->emptyInputSignup($name, $email, $userName, $lastName, $password, $repeatPassword) !== false) {
        header("location: /Portafolio/src/views/register.php?error=emptyinput");
        exit();
    }

    if ($ops->invalidUsername($userName) !== false) {
        header("location: /Portafolio/src/views/register.php?error=invalidUsername");
        exit();
    }

    if ($ops->invalidEmail($email) !== false) {
        header("location: /Portafolio/src/views/register.php?error=invalidEmail");
        exit();
    }

    if ($ops->passMatch($password, $repeatPassword) !== false) {
        header("location: /Portafolio/src/views/register.php?error=passwordMismatch");
        exit();
    }

    if ($ops->userOrEmailExists(new DbConnection, $userName, $email)) {
        header("location: /Portafolio/src/views/register.php?error=usernameTaken");
        exit();
    }
    //si no hay ningun error se procede a crear el usuario
    if ($ops->createUser(new DbConnection, $userName, $name, $lastName, $email, $password, $gender)) {
        header("location: /Portafolio/src/views/register.php?error=databaseError");
        exit();
    } else {
        header("location: /Portafolio/index.php?success=accountCreated");
        exit();
    }
}
else {
    header("location: /Portafolio/src/views/register.php");
    exit();
}