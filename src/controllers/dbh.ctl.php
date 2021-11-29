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

        function insertUser($userName, $name, $lastName, $email, $hashPassword ,$gender) {
            $result;
            try {
                $query = $this->pdo->prepare('INSERT INTO users (username, name, lastname, email, password, id_genero) VALUES ("'. $userName .'", "'. $name .'", "'. $lastName .'", "'. $email .'", "'. $hashPassword .'", "'. $gender .'")');
                $query->execute();
                $result = false;
                return $result;
            }
            catch (error) {
                $result = true;
                return $result;
            }
        }

        function insertBlog($userid, $title, $img) {
            $result;
            try {
                $query = $this->pdo->prepare('INSERT INTO blogpost (title, blog_img_route, author_id, fech_agregado) VALUES ("'. $title .'", "'. $img .'", "'. $userid .'", "'. date("Y/m/d") .'")');
                $query->execute();
                $id = $this->pdo->lastInsertId();
                return $result = $id;
            }
            catch (error) {
                $result = true;
                return $result;
            }
        }

        function insertParragraphs($lastId, $subtitulos, $parrafos, $fuentes) {
            for ($i=0; $i < count($parrafos); $i++) {
                try {
                    $query = $this->pdo->prepare('INSERT INTO parragraphs (parragraph, source, subtitle, blog_id) VALUES ("'. $parrafos[$i] .'", "'. $fuentes[$i] .'", "'. $subtitulos[$i] .'", "'. $lastId .'")');
                    $query->execute();
                }
                catch (error) {
                    $result = true;
                    return $result;
                }
            }
        }

        function getAllBlogs() {
            try {
                $query = $this->pdo->prepare('SELECT users.name, users.lastname, blogpost.title, blogpost.blog_img_route, blogpost.fech_agregado, SUBSTRING(parragraphs.parragraph, 1, 200) as parragraph FROM `blogpost` JOIN parragraphs ON blogpost.blog_id = parragraphs.blog_id JOIN users ON blogpost.author_id = users.user_id GROUP BY blogpost.blog_id');
                $query->execute();
                return $query->fetchAll();
            } catch (error) {
                $result = true;
                return $result;
            }
        }
        

    }