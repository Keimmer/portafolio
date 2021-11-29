<?php 
    include_once 'src/views/partials/header.php';
    $mesResponse = require 'src/views/partials/message.res-handler.php';
?>
    <div class="success" :class="{ successVisible: showToast}">{{ message }}</div>
    <div class="container" @mounted="messageCheck('<?php echo isset($_GET["success"]);?>', '<?php echo $mesResponse;?>')">
            <h1>Hola!, mi nombre es Keimmer Altuve</h1>
            <p>Soy un informático especializándose en desarrollo de aplicaciones web full-stack, en esta pagina podrás observar los proyectos en los que he trabajado y mis experiencias</p>
    </div>

<?php 
    include_once 'src/views/partials/footer.php';
?>