<?php 
    include_once 'partials/header.php';
?>
    <div class="container">
        <div class="form-card">
            <h2>Ingresar</h2>
            <form action="../controllers/login.ctl.php" method="post">
                <input class="form-field" type="text" name="username" placeholder="Nombre de usuario.">
                <input class="form-field" type="password" name="password" placeholder="Contraseña">
                <button class="form-btn" type="submit" name="submit">Ingresar</button>
            </form>
            <?php 
                include_once 'partials/login.e-handler.php';
            ?>
        </div>
    </div>

<?php 
    include_once 'partials/footer.php';
?>