<?php 
    include_once 'partials/header.php';
?>
    <div class="container">
        <h1 class="center">Recuerda agregar la fuente de los articulos que no sean de tu propiedad intelectual</h1><br>
        <div class="form-card-blog" id="form">
            <h2>Crear Blog.</h2>
            <form action="../controllers/newBlog.ctl.php" method="post" enctype="multipart/form-data">
                <input class="form-field" type="text" name="title" placeholder="Titulo del blog">
                <label class="input-file">
                    <input type="file" name="file">
                    Selecciona una imagen para tu blog.
                </label>
                <div v-for="(input, index) in inputs" :key="index">
                    <input type="text" class="form-field" :name="'subtitle'+index" :placeholder="'subtitulo '+index">
                    <textarea class="form-field" type="text" :name="'parr'+index" :placeholder="'parrafo '+index"></textarea>
                    <input class="form-field" type="text" :name="'source'+index" :placeholder="'fuente del parrafo '+index">
                </div>
                <input type="hidden" name="amount" :value="inputs.length">
                <a class="form-btn btn-sm" @click="addInputs">Agregar Parrafo</a>
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