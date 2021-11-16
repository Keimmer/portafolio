<?php

    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 'emptyinput':
                echo "<p class='error'>Debes llenar todos los campos!.</p>";
                break;
            case 'invalidUsername':
                echo "<p class='error'>Nombre de usuario invalido!.</p>";
                break;
            case 'invalidEmail':
                echo "<p class='error'>Correo electronico invalido!.</p>";
                break;
            case 'passwordMismatch':
                echo "<p class='error'>Las contraseñas deben coincidir!.</p>";
                break;
            case 'usernameTaken':
                echo "<p class='error'>Nombre de usuario o correo electronico ya esta en uso!.</p>";
                break;
            case 'databaseError':
                echo "<p class='error'>Hubo un problema con la base de datos!.</p>";
                break;
            case 'none':
                echo "<p class='success'>Cuenta creada con exito!.</p>";
                break;
            
            default:
                # code...
                break;
        }
    }