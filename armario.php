<?php

require_once("./conexion.php");

// Obtener estilos
$estilos = $gbd->query("SELECT * FROM estilos_tb")->fetchAll(PDO::FETCH_ASSOC);
$estilo = isset($_GET['estilo']) ? intval($_GET['estilo']) : 0;
$nombreEstilo = "todo";
if ($estilo > 0) {
    $stmt = $gbd->prepare("SELECT nombre_estilo FROM estilos_tb WHERE id = ?");
    $stmt->execute([$estilo]);
    $nombreEstilo = $stmt->fetchColumn();
    $consulta = "SELECT * FROM articulos_tb WHERE id_estilo = ? ORDER BY nombre_art ASC";
    $sentencia = $gbd->prepare($consulta);
    $sentencia->execute([$estilo]);
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} else {
    $consulta = "SELECT * FROM articulos_tb ORDER BY nombre_art ASC";
    $sentencia = $gbd->query($consulta);
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}
 
?>

<?php include_once("./header.php");?>
    
    <section id="items">
        <div class="container-fluid px-4 px-sm-5">
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


        <div class="container-fluid">
            <div class="row mt-5">
                <?php foreach($resultados as $fila){ ?>
                    
                    <div class="col-12 col-lg-4 col-xl-3 columnaItem justify-content-center d-flex flex-column align-items-center ">
                        <a class="d-block justify-self-center" href="./articulo.php?id=<?=$fila['id']?>">
                            <div class="contenedorImagenItemArmario">
                                <img src="./img/imgArticulos/<?= $fila['img_art']?>" alt="">
                            </div>
                            <p class="text-dark"><?= $fila['nombre_art']?></p>
                        </a>
    
                    </div>
            
                <?php } ?>
                
            </div>
        </div>
    </section>
    

<?php include_once("./footer.php");?>