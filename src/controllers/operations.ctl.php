<?php

class DbController {
    function emptyInputSignup($name, $email, $userName, $lastName, $password, $repeatPassword) {
        $result;
        if (empty($userName) || empty($name) || empty($email) || empty($lastName) || empty($password) || empty($repeatPassword)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function invalidUsername($userName) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function passMatch($password, $repeatPassword) {
        $result;
        if ($password !== $repeatPassword) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function userOrEmailExists($dbConn, $username, $email) {
        $result = $dbConn->getExtUnameEmail($username, $email);
        if (!empty($result)) {
            //$result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function createUser($dbConn, $userName, $name, $lastName, $email, $password, $gender) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        if ($dbConn->insertUser($userName, $name, $lastName, $email, $hashPassword, $gender)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emptyInputLogin($userName, $password) {
        $result;
        if (empty($userName) || empty($password)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($dbConn, $userName, $password) {
        $userExists = $this->userOrEmailExists($dbConn, $userName, $userName);

        if($userExists === false) {
            header("location: /Portafolio/src/views/login.php?error=userOrEmailNotFound");
            exit();
        } else {
            $passwordHashed = $userExists["password"];
            $checkPass = password_verify($password, $passwordHashed);

            if($checkPass === false){
                header("location: /Portafolio/src/views/login.php?error=wrongPassword");
                exit();
            } else if ($checkPass === true) {
                session_start();
                $_SESSION["userid"] = $userExists["user_id"];
                $_SESSION["username"] = $userExists["username"];
                $_SESSION["name"] = $userExists["name"];
                header("location: /Portafolio/index.php?success=loginSucceded");
            }
        }
    }

    function createNewBlog($dbConn, $userid, $titulo, $imgPath, $subtitles, $parragraphs, $sources) {
        $lastId = $dbConn->insertBlog($userid, $titulo, $imgPath);
        $dbConn->insertParragraphs($lastId, $subtitles, $parragraphs, $sources);
    }
}