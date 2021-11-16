<?php

    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case 'emptyinput':
                echo "<p class='error'>Debes llenar todos los campos!.</p>";
                break;
            case 'userOrEmailNotFound':
                echo "<p class='error'>Nombre de usuario o correo electronico invalido!.</p>";
                break;
            case 'wrongPassword':
                echo "<p class='error'>Contraseña invalida!.</p>";
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