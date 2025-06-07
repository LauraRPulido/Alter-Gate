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
                <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center mb-4 mb-md-0">
                    <div class="contenedorImagenItem">
                        <img src="./img/imgArticulos/<?= $producto['img_art']?>" class="img-fluid">
                    </div>
                    <div class="botonNov text-center w-50 mt-4">
                        <a href=""class="btn"><?= $producto['enlace_art']?></a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="row justify-content-center">
                                    <div class="col-12 mt-4 ">
                                        <h4 class="mb-4"><?= $producto['nombre_art']?></h4>
                                        <p style="text-align:justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni quaerat obcaecati modi minima alias sint nobis. Sapiente ipsa explicabo temporibus deserunt sint assumenda autem in quas. Atque enim eveniet vero.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="selectorEstilo" class="container-fluid px-4 px-lg-5 w-100">
                                <div class="row d-flex align-items-center justify-content-center mt-5">
                                    <div class="col-12 col-xl-6 tarjetaDiseñadorArt mx-auto w-100">
                                        <div class="imgContenedor d-flex justify-content-center">
                                            <img src="" alt="" class="img-fluid imagenCirculo">
                                        </div>
                                        <div class="my-3 px-3 text-center">
                                            <h4>Emilio Fernández</h4>
                                            <div>
                                                <a class="botonNov">Ver Diseñador</a>
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
