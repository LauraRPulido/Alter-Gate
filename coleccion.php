<?php

if(isset ($_GET['id'])){
    require_once("./conexion.php");

    $id = $_GET['id'];
    $consulta = "SELECT * FROM colecciones_tb, users_tb WHERE colecciones_tb.id_user = users_tb.id AND colecciones_tb.id = ?";
    $sentencia = $gbd->prepare($consulta);
    $sentencia->execute([$id]);
    
    $producto = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Obtener artículos de la colección
    $articulos = [];
    $stmtArticulos = $gbd->prepare(
        "SELECT articulos_tb.* 
         FROM coleccion_articulo_tb 
         JOIN articulos_tb ON coleccion_articulo_tb.id_articulo = articulos_tb.id 
         WHERE coleccion_articulo_tb.id_coleccion = ?"
    );
    $stmtArticulos->execute([$id]);
    $articulos = $stmtArticulos->fetchAll(PDO::FETCH_ASSOC);
}

?>

<?php include_once("./header.php")?>

    <section id="bannerColeccion" class="container-fluid vh-100 position-relative" style="background: url(./img/colecciones/<?= htmlspecialchars($producto['imagen']) ?>) center center /cover ;">

    </section>


    <div id="diseñador" class="container-fluid px-4 px-lg-5">
            <div class="row d-flex align-items-center justify-content-center justify-content-md-between mt-5">
                <div class="col-12 col-md-6 col-xl-4 mb-4 mb-md-4 ms-0 ms-lg-4">
                    <h1 class=""><?= htmlspecialchars($producto['nombre_coleccion']) ?></h1>
                </div>
                <div class="col-9 col-md-5 col-xl-4 tarjetaDiseñador">
                    
                    <div class="imgContenedor">
                        <img src="./img/<?= htmlspecialchars($producto['imgUser']) ?>" alt="<?= htmlspecialchars($producto['username']) ?>" class="img-fluid imagenCirculo">

                    </div>

                     <div class="col col-lg-auto col-xl my-3 my-lg-3 px-3 text-start ">
                            <h4><?= htmlspecialchars($producto['username']) ?></h4>
                            
                        <div class="col-12">
                            
                                <a href="diseñador.php?id=<?= $producto['id_user'] ?>" class="botonNov">Ver Diseñador</a>
                                
                        </div>
                    </div>
                        

                </div>
            </div>
    </div>

    <div class="container-fluid">
            <div class="row my-5">
                <?php foreach($articulos as $articulo): ?>
                <div class="col-6 col-lg-4 col-xl-3 columnaItem">
                    <div class="contenedorImagenItem">
                        <img src="./img/imgArticulos/<?= htmlspecialchars($articulo['img_art']) ?>" alt="<?= htmlspecialchars($articulo['nombre_art']) ?>">
                    </div>
                    <p><?= htmlspecialchars($articulo['nombre_art']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            
    </div>

<?php include_once("./footer.php")?>


