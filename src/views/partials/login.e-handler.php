<?php

    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 'emptyinput':
                return "Debes llenar los campos.";
                break;
            case 'userOrEmailNotFound':
                return "Nombre de usuario o correo electronico no existe!.";
                break;
            case 'wrongPassword':
                return "Contraseña invalida.";
                break;
            case 'databaseError':
                return "Error de comunicacion.";
            case 'none':
                return "Login Correcto.";
            
            default:
                # code...
                break;
        }
    }