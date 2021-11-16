<?php
    class DbConnection {
        private $serverName = "localhost";
        private $dbUsername = "root";
        private $dbPassword = "";
        private $dbName = "portafolio";
        private $pdo;

        function __construct() {
            $arrOptions = array(
                PDO::ATTR_EMULATE_PREPARES => FALSE, 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, 
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            );

            try {
                $this->pdo = new PDO('mysql:dbname='. $this->dbName . ';host='. $this->serverName. '', $this->dbUsername, $this->dbPassword);
                return $this->pdo;
            }
            catch (PDOExeption $error) {
                exit('Error al conectarse a la base de datos');
            }
        }

        function getExtUnameEmail($username, $email) {
            $query = $this->pdo->prepare('SELECT * FROM users WHERE username = "'. $username .'" OR email = "'. $email. '"');
            $query->execute();
            return $query->fetch();
        }

        function insertUser($userName, $name, $lastName, $email, $hashPassword) {
            $result;
            try {
                $query = $this->pdo->prepare('INSERT INTO users (username, name, lastname, email, password) VALUES ("'. $userName .'", "'. $name .'", "'. $lastName .'", "'. $email .'", "'. $hashPassword .'")');
                $query->execute();
                $result = false;
                return $result;
            }
            catch (error) {
                $result = true;
                return $result;
            }
        }
        

    }