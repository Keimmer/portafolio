<?php

    if (isset($_GET["success"])) {
        switch ($_GET["success"]) {
            case 'loginSucceded':
                return "Bienvenido a su cuenta!.";
                break;
            case 'logoutSucceded':
                return "Sesión cerrada con exito!.";
                break;
            case 'none':
                return "Login Correcto.";
            case 'accountCreated':
                return "Cuenta creada con exito!";
            
            default:
                # code...
                break;
        }
    }