<?php

if(isset ($_GET['id'])){
    require_once("./conexion.php");

    $id = $_GET['id'];
    $consulta = "SELECT * FROM articulos_tb, users_tb WHERE articulos_tb.id_user = users_tb.id AND articulos_tb.id = ?";
    $sentencia = $gbd->prepare($consulta);
    $sentencia->execute([$id]);
    
    $producto = $sentencia->fetch(PDO::FETCH_ASSOC);

}

?>
<?php include_once("./header.php"); ?>

    <section id="producto">

        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-4 d-flex flex-column align-items-center justify-content-center mb-4 mb-md-0">
                    <div class="contenedorImagenItemArmario">
                        <img src="./img/imgArticulos/<?= $producto['img_art']?>" class="img-fluid">
                    </div>
                    <div class="botonNov text-center w-50 mt-4">
                        <a href="<?= $producto['enlace_art']?>"class="btn">Ir al sitio</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-8 col-lg-12 mt-4 text
                                    -center text-lg-start">
                                        <h4 class="mb-4"><?= $producto['nombre_art']?></h4>
                                        <p><?= $producto['descripcion_art']?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="selectorEstilo" class="container-fluid px-4 px-lg-5 w-100">
                                <div class="row d-flex align-items-center justify-content-center mt-5">
                                    <div class="col-12 col-xl-6 tarjetaDiseñadorArt d-flex justify-content-evenly w-100">
                                        <div class="imgContenedor d-flex justify-content-center">
                                            <img src="./img/<?= $producto['imgUser']?>" alt="" class="img-fluid imagenCirculo">
                                        </div>
                                        <div class="my-3 px-3 text-center ">
                                            <h4><?= $producto['username']?></h4>
                                            <div>
                                                <a href="./diseñador.php?id=<?=$producto['id_user']?>" class="botonNov">Ver Diseñador</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php include_once("./footer.php"); ?>
