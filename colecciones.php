<?php
include_once("./conexion.php");
// Obtener estilos
$estilos = $gbd->query("SELECT * FROM estilos_tb")->fetchAll(PDO::FETCH_ASSOC);
$estilo = isset($_GET['estilo']) ? intval($_GET['estilo']) : 0;
$nombreEstilo = "todo";
if ($estilo > 0) {
    $stmt = $gbd->prepare("SELECT nombre_estilo FROM estilos_tb WHERE id = ?");
    $stmt->execute([$estilo]);
    $nombreEstilo = $stmt->fetchColumn();
    $stmtCol = $gbd->prepare("SELECT * FROM colecciones_tb WHERE id_estilo = ?");
    $stmtCol->execute([$estilo]);
    $colecciones = $stmtCol->fetchAll(PDO::FETCH_ASSOC);
} else {
    $colecciones = $gbd->query("SELECT * FROM colecciones_tb")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<?php include_once("./header.php");?>
<section id="banner" class="bannerColecciones container-fluid vh-100 position-relative" style="background: url(./img/imagenBanner.jpg) center center /cover;">
    <div class="textoBanner">
        <h3 class="fs-5 fs-md-4">Nueva Colección</h3>
        <h2 class="fs-3 fs-md-2">"Wiggle"</h2>
   </div>
</section>
<section class="container-fluid my-5" id="colecciones">
    <div id="selectorEstilo" class="container-fluid px-4 px-sm-5">
        <div class="row d-flex align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-md-9 col-lg-6 text-center text-lg-start">
                <h3>Buscando <?= $nombreEstilo === "todo" ? "todo..." : htmlspecialchars($nombreEstilo) ?></h3>
            </div>
            <div class="col-12 col-md-9 col-lg-4 selectorEstilo">
                <?php foreach($estilos as $estiloItem) { ?>
                    <div class="contenedorEstilo<?= ($estilo == $estiloItem['id']) ? ' active' : '' ?>">
                        <a href="?estilo=<?= $estiloItem['id'] ?>">
                            <img src="./img/estilos/<?= htmlspecialchars($estiloItem['icono'] ?? '') ?>" alt="<?= htmlspecialchars($estiloItem['nombre_estilo']) ?>">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center g-4 pb-5 pt-5 m-0 p-0 ">
        <?php foreach($colecciones as $coleccion) { ?>
            <div class="col-12 col-lg-6 p-0 m-0">
                <a href="coleccion.php?id=<?= $coleccion['id'] ?>" class="text-decoration-none">
                    <div class="coleccionCard" style="background-image: url('./img/colecciones/<?= htmlspecialchars($coleccion['imagen']) ?>'); background-position: center; background-size: cover;">
                        <div class="textoCol">
                            <h4><?= htmlspecialchars($coleccion['nombre_coleccion']) ?></h4>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</section>
<?php include_once("./footer.php");?>