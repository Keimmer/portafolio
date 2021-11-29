<?php
    $fileNameNew = "";
    session_start();
    if (isset($_SESSION["userid"])){
        //verificamos que hay un post request
        if (isset($_POST['submit'])) {

            function validString($string) {
                if(preg_match("/^[0-9a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s(),.'-_=+%.&:;\/?]+$/", $string)){
                    return true;
                } else {
                    return false;
                }
            }
            
            function uploadFile() {
                $file = $_FILES['file']; //archivo de imagen
                
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
                
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                
                
                $allowed = array('jpg', 'jpeg', 'png');
                
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($fileSize < 500000) {
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = '../../res/img/'.$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            return $fileNameNew;
                        } else {
                            //header error file too big
                            return true;
                        }
                    } else {
                        //header error uploading img
                        return true;
                    }
                } else {
                    //header err
                    return true;
                }
            }
        
            function ordenarEnviarDatosBlog() {

                require 'dbh.ctl.php';
                require 'operations.ctl.php';
                $ops = new DbController;
                $userid = $_SESSION["userid"];
                $titulo = $_POST['title']; //titulo del articulo
                $amount = $_POST['amount'];
                
                $subtitles = [];
                $parragraphs = [];
                $sources = [];
                //contamos el valor de amount que nos indica cuantos parrafos se agregaron
                for($i=0; $i<$amount; $i++){
                    //almacenamos cada campo en el arreglo
                    if(validString($_POST['subtitle'.$i])) {
                        array_push($subtitles, $_POST['subtitle'.$i]);
                    } else {
                        echo 'error con un subtitulo';
                    }
                    if (validString($_POST['parr'.$i])) {
                        array_push($parragraphs, $_POST['parr'.$i]);
                    } else {
                        echo 'error con un parrafo';
                    }
                    if(validString($_POST['source'.$i])) {
                        array_push($sources, $_POST['source'.$i]);
                    } else {
                        echo 'error con una fuente';
                    }
                }
                
                /* print_r($subtitles);
                print_r($parragraphs);
                print_r($sources); */
                $fileNameNew = uploadFile();
                if($fileNameNew === false){
                    header("Location: ../views/bloglist.php?error=fileUploadError");
                } else {
                    $ops->createNewBlog(new DbConnection, $userid, $titulo, $fileNameNew, $subtitles, $parragraphs, $sources);
                    header("Location: ../views/bloglist.php?success=blogCreated");
                }
            }
        
            ordenarEnviarDatosBlog();
        
        }
    } else {
    echo 'no hay un usuario';
    }