<?php

require_once("./conexion.php");

$consulta = ("SELECT * FROM articulos_tb");

$sentencia = $gbd ->query($consulta);

$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
 
?>

<?php include_once("./header.php");?>
    
    
    <!-- <section id="filtros">
        <div class="container">
            <div class="row flex flex-wrap  justify-content-center row-gap-4">
                <div class="col-auto filtroPrenda"><h4>Tops</h4></div>
                <div class="col-auto filtroPrenda"><h4>Bottoms</h4></div>
                <div class="col-auto filtroPrenda"><h4>Chaquetas y sudaderas</h4></div>
                <div class="col-auto filtroPrenda"><h4>Vestidos</h4></div>
                <div class="col-auto filtroPrenda"><h4>Zapatos</h4></div>
                <div class="col-auto filtroPrenda"><h4>Accesorios</h4></div>
            </div>
        </div>


    </section> -->

    <section id="items">
        <div class="container-fluid px-4 px-sm-5">
            <div class="row d-flex align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-md-9 col-lg-6 text-center text-lg-start">
                    <h3>Buscando todo...</h3>
                </div>
                <div class="col-12 col-md-9 col-lg-4 selectorEstilo">
                    
                        <div class="contenedorEstilo">
                            <img src="./img/estilos/iconY2K-min.png" class="">
                        </div>
                        <div class="contenedorEstilo">
                            <img src="./img/estilos/iconPunk-min.jpg" class="">
                        </div>
                        <div class="contenedorEstilo">
                            <img src="./img/estilos/iconGoth-min.jpg" class="" alt="">
                        </div>
                        <div class="contenedorEstilo">
                            <img src="./img/estilos/iconEmo-min.jpg" class="">
                        </div>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-5">
                <?php foreach($resultados as $fila){ ?>
                    <div class="col-12 col-lg-4 col-xl-3 columnaItem jus
                    tify-content-center d-flex flex-column align-items-center">
                        <div class="contenedorImagenItem">
                            <img src="./img/imgArticulos/<?= $fila['img_art']?>" alt="">
                        </div>
                        <p><?= $fila['nombre_art']?></p>

                    </div>
                <?php } ?>
                
            </div>
        </div>
    </section>
    

<?php include_once("./footer.php");?>