<?php 
    include_once 'partials/header.php';

?>
    <div class="container">
        <h1 class="center">Crea tu cuenta y comienza un nuevo camino realizando publicaciones en nuestros blog's!...</h1><br>
        <div class="form-card" id="form">
            <h2>Crear Cuenta.</h2>
            <form action="../controllers/signup.ctl.php" method="post">
                <input class="form-field" type="text" name="username" placeholder="Nombre de usuario.">
                <input class="form-field" type="text" name="name" placeholder="Nombre.">
                <input class="form-field" type="text" name="lastname" placeholder="Apellido.">
                <input class="form-field" type="text" name="email" placeholder="Correo electronico.">
                <input class="form-field" type="password" name="password" placeholder="Contraseña.">
                <input class="form-field" type="password" name="repeatPassword" placeholder="Repita la contraseña.">
                <button class="form-btn" type="submit" name="submit">Crear Cuenta</button>
            </form>
            <?php 
                include_once 'partials/register.e-handler.php';
            ?>
        </div>
    </div>



<?php 
    include_once 'partials/footer.php';
?>