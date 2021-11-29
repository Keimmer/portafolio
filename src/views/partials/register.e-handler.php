<?php

    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 'emptyinput':
                return "Debes llenar todos los campos!";
                break;
            case 'usernameTaken':
                return "Nombre de usuario o correo electronico ya esta en uso!.";
                break;
            case 'databaseError':
                return "Hubo un problema con la base de datos!.";
                break;
            case 'none':
                return "Cuenta creada con exito!.";
                break;
            
            default:
                # code...
                break;
        }
    }