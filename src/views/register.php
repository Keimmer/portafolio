<?php 
    include_once 'partials/header.php';
    $errResponse = require 'partials/register.e-handler.php';
?>
    <div class="error" :class="{ errorVisible: showToast}">{{ message }}</div>
    <div class="container" @mounted="errorCheck('<?php echo isset($_GET["error"]);?>', '<?php echo $errResponse;?>')">
        <h1 class="center">Crea tu cuenta y comienza un nuevo camino realizando publicaciones en nuestros blog's!...</h1><br>
        <div class="form-card" id="form">
            <h2>Crear Cuenta.</h2>
            <form action="../controllers/signup.ctl.php" method="post">
                <label class="form-label">Nombre de usuario</label>
                <input class="form-field" v-on:change="validateRegister" v-model="username" type="text" name="username" placeholder="Nombre de usuario.">
                <label class="form-label">Nombre</label>
                <input class="form-field" v-on:change="validateRegister" v-model="name" type="text" name="name" placeholder="Nombre.">
                <label class="form-label">Apellido</label>
                <input class="form-field" v-on:change="validateRegister" v-model="lastname" type="text" name="lastname" placeholder="Apellido.">
                <label class="form-label">Género</label>
                <select name="genero" class="form-field" placeholder="Genero">
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
                <label class="form-label">Correo</label>
                <input class="form-field" v-on:change="validateRegister" v-model="email" type="text" name="email" placeholder="Correo electronico.">
                <label class="form-label">Contraseña</label>
                <input class="form-field" v-on:change="validateRegister" v-model="password" type="password" name="password" placeholder="Contraseña.">
                <label class="form-label">Repita la Contraseña</label>
                <input class="form-field" v-on:change="validateRegister" v-model="passRepeat" type="password" name="repeatPassword" placeholder="Repita la contraseña.">
                <button :disabled="isActive" class="form-btn" type="submit" name="submit">Crear Cuenta</button>
            </form>
            <?php 
                include_once 'partials/register.e-handler.php';
            ?>
        </div>
    </div>



<?php 
    include_once 'partials/footer.php';
?>