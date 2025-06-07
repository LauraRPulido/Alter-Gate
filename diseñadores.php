<?php

require_once("./conexion.php");
// Obtener todos los usuarios
$usuarios = $gbd->query("SELECT * FROM users_tb")->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once("./header.php");?>
<section id="pagDiseñadores" class="container-fluid ">
    <div class="row">
        <h3 class="tituloGrandNeg">Diseñadores</h3>
    </div>
    <div class="row my-4">
        <?php foreach($usuarios as $usuario){
            // Para cada usuario, obtener hasta 2 artículos
            $stmt = $gbd->prepare("SELECT * FROM articulos_tb WHERE id_user = ? LIMIT 2");
            $stmt->execute([$usuario['id']]);
            $articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <div class="col-12 col-xl-6 d-flex justify-self-center">
            <div class="container contenedorDis">
                <div class="row py-3 d-flex align-items-center flex-column flex-md-row flex-lg-column flex-xl-row">
                    <div class="col-auto">
                        <div class="contenedorPerfil">
                            <a href="./diseñador.php?id=<?= htmlspecialchars($usuario['id']) ?>">
                                <img src="./img/<?= htmlspecialchars($usuario['imgUser'] ?? 'diseñadorEmilio.jpg') ?>" alt="" class="imagenCirculo">
                            </a>
                        </div>
                    </div>
                    <div class="col col-lg-auto col-xl my-3 perfilDis text-center text-md-start text-lg-center text-xl-start">
                        <a href="./diseñador.php?id=<?= htmlspecialchars($usuario['id']) ?>" class="text-decoration-none text-dark">
                            <h4><?= htmlspecialchars($usuario['username']) ?></h4>
                        </a>
                        <p><?= htmlspecialchars($usuario['bio'] ?? 'Sin descripción.') ?></p>
                    </div>
                    <div class="col-12 col-lg-3 col-xl-2 text-center text-xl-start contadorLikes">
                        <h5><?= htmlspecialchars($usuario['likes'] ?? '0') ?><span><i class="bi bi-heart"></i></span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <?php foreach($articulos as $articulo){ ?>
                                <div class="col-6 col-md-6 col-lg-6 col-xl-6 columnaItemDis d-flex flex-column align-items-center justify-content-center">
                                    <a href="./articulo.php?id=<?= htmlspecialchars($articulo['id']) ?>" class="d-block">
                                        <div class="contenedorImagenItem">
                                            <img src="./img/imgArticulos/<?= htmlspecialchars($articulo['img_art']) ?>" alt="">
                                        </div>
                                    </a>
                                    <p><?= htmlspecialchars($articulo['nombre_art']) ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col sliderPuntos text-center">
                        <i class="bi bi-circle-fill"></i>
                        <i class="bi bi-circle"></i>
                        <i class="bi bi-circle"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php include_once("./footer.php");?>