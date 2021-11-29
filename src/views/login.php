<?php 
    include_once 'partials/header.php';
    $errResponse = require 'partials/login.e-handler.php';
?>
    <div class="error" :class="{ errorVisible: showToast}">{{ message }}</div>
    <div class="container" @mounted="errorCheck('<?php echo isset($_GET["error"]);?>', '<?php echo $errResponse;?>')">
        <div class="form-card">
            <h2>Ingresar</h2>
            <form action="../controllers/login.ctl.php" method="post">
                <input v-on:change="validateUser" v-model="username" class="form-field" type="text" name="username" placeholder="Nombre de usuario.">
                <input v-on:change="validateUser" v-model="password" class="form-field" type="password" name="password" placeholder="Contraseña">
                <button :disabled="isActive" class="form-btn" type="submit" name="submit">Ingresar</button>
            </form>
            
        </div>
    </div>

<?php 
    include_once 'partials/footer.php';
?>