<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portafolio</title>
    <link rel="stylesheet" href="/Portafolio/res/css/styles.css"></link>
    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <script src="/Portafolio/res/js/toast.js" type="module"></script>
    <div class="header">
        <div class="logoContainer">
            <img src="/Portafolio/res/img/logo.svg">
            
        </div>
        <h4>Keimmer Altuve</h4>
        <div class="headerItems">

            <div class="headerItem" id="headerItem">
                <a href="/Portafolio/index.php">Inicio</a>
            </div>
            <div class="headerItem" id="headerItem">
                <a href="/Portafolio/src/views/proyectos.php">Proyectos</a>
            </div>
            <div class="headerItem" id="headerItem">
                <a href="/Portafolio/src/views/contacto.php">Contacto</a>
            </div>
            <div class="headerItem" id="headerItem" <?php if (isset($_SESSION["username"])) { echo '@click="setBlogMActive"'; } ?>>
                
                <?php
                    if (isset($_SESSION["username"])) {
                        echo 'Blog';
                        echo '<div v-if="bMenuActive" class="headerItemBox" :class="{ hItemBVisible: mounted}" @mounted="setMounted" @mouseleave="setBlogMActive">';
                        echo '<div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/views/bloglist.php">Todos los Blog</a></div>';
                        echo '<div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/views/createBlog.php">Crear Blog</a></div>';
                        echo '</div>';
                    } else {
                        echo '<a href="/Portafolio/src/views/bloglist.php">Blog</a>';
                    }
                ?>
            </div>
            <div class="headerItem" id="headerItem" @click="setActive">
                Cuenta
                <div v-if="menuActive" class="headerItemBox" :class="{ hItemBVisible: mounted}" @mouseleave="setActive" @mounted="setMounted">
                <?php            
                    if (isset($_SESSION["username"])) {
                        echo '<div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/views/profile.php">Perfil de '. $_SESSION["username"]. '</a></div>';
                        echo '<div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/controllers/logout.ctl.php">Salir</a></div>';
                    } else {
                        echo '<div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/views/login.php">Ingresar</a></div><div class="headerBoxItem" id="headerItem"><a href="/Portafolio/src/views/register.php">Crea tu Cuenta</a></div>';
                    }
                ?>
                </div>
            </div>
        </div>
        <a class="menu" href="javascript:void(0);" onclick="openMenu()"><i class="fas fa-bars"></i></a>

    </div>
    <div class="dropDownMenu" id="menu">
    <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/index.php">Inicio</a>
            </div>
            <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/src/views/login.php">Ingresar</a>
            </div>
            <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/src/views/register.php">Crea tu Cuenta</a>
            </div>
            <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/src/views/proyectos.php">Proyectos</a>
            </div>
            <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/src/views/contacto.php">Contacto</a>
            </div>
            <div class="dropDownItem" id="dropDownItem">
                <a href="/Portafolio/src/views/blog.php">Blog</a>
            </div>
    </div>