<?php 
    include_once 'partials/header.php';
    $blogs = require_once '../controllers/bloglist.ctl.php';
    /* print_r($blogs); */
?>
    <div class="container">
        <h2>Blogs. Que hay de nuevo?.</h2>
        <div class="smallContainer">

            <a href="/portafolio" class="article">
                <div class="artimg">
                    <img src="/Portafolio/res/img/poo.jpg" alt="">
                </div>
                <div class="title">
                    <h3>Programación Orientada a objetos</h3>
                    <h4>NOV 18-2021 - Keimmer Altuve</h4>
                    <div class="parr">
                        <p>Es un paradigma de programación que viene a innovar la forma de obtener resultados. Los objetos se utilizan como metáfora para emular las entidades reales del negocio a modelar.
                        </p>
                    </div>                    
                </div>
            </a>
            

            <?php 
                for ($i=0; $i < count($blogs); $i++) { 
                    echo '
                    <a href="" class="article">
                        <div class="artimg">
                            <img src="/Portafolio/res/img/'.$blogs[$i]['blog_img_route'].'">
                        </div>
                        <div class="title">
                            <h3>'.$blogs[$i]['title'].'</h3>
                            <h4>'.$blogs[$i]['fech_agregado'].' - '.$blogs[$i]['name'].' '.$blogs[$i]['lastname'].'</h4>
                            <div class="parr">
                                <p>'.$blogs[$i]['parragraph'].'
                                </p>
                            </div>
                        </div>
                    </a>';
                }
            ?>
        </div>
    </div>
    
    
    
<?php 
    include_once 'partials/footer.php';

?>