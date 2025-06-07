<?php 
require_once("./conexion.php");
// Obtener la id del diseñador por GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$diseñador = null;
$articulos = [];
if ($id > 0) {
    // Consulta para obtener la información del diseñador
    $stmt = $gbd->prepare("SELECT * FROM users_tb WHERE id = ? LIMIT 1");
    $stmt->execute([$id]);
    $diseñador = $stmt->fetch(PDO::FETCH_ASSOC);
    // Consulta para obtener los artículos de ese diseñador
    $stmt2 = $gbd->prepare("SELECT * FROM articulos_tb WHERE id_user = ?");
    $stmt2->execute([$id]);
    $articulos = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
?>
<?php include_once("./header.php");?>

    <section id="bannerDis">

        <div class="container-fluid d-flex justify-content-center px-4">
           
                    <div class="container-fluid bannerDis px-5 py-2">
                        <div class="row py-3 d-flex align-items-center flex-column flex-lg-column flex-xl-row justify-content-xl-between">
                            <div class="col-auto">
                                <div class="contenedorPerfil">

                                    <img src="./img/<?= htmlspecialchars($diseñador['imgUser'] ?? 'diseñadorEmilio.jpg') ?>" alt="" class="imagenCirculo">
                                </div>    
                            </div>

                            <div class="col  col-xl-6 my-3 perfilDis text-center text-lg-center text-xl-start">
                                <h4><?= htmlspecialchars($diseñador['username'] ?? 'Desconocido') ?></h4>
                                <p><?= htmlspecialchars($diseñador['bio'] ?? 'Sin descripción.') ?></p>
                                <?php if (!empty($diseñador['enlace'])): ?>
                                    <a href="<?= htmlspecialchars($diseñador['enlace']) ?>" target="_blank" class="btn btn-outline-dark my-2">Ir al sitio del diseñador</a>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex col-12 col-xl-auto text-center text-xl-start justify-content-center gap-3">
                                <div class="contContadores">
                                    <p>Me gusta</p>
                                    <h5><?= htmlspecialchars($diseñador['likes'] ?? '0') ?><span></span></h5>
                                    

                                </div>
                                <div class="contContadores">
                                    <p>Artículos</p>
                                    <h5><?= count($articulos) ?></h5>
                                    

                                </div>
                                <div class="contContadores">
                                    <p>Colecciones</p>
                                    <h5>0</h5>

                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        
    </section>

    <section id="desplegable">
     
    <div class="accordion px-3 px-xl-5 my-5" id="">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
            Colecciones
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
          <div class="accordion-body container-fluid">
            <div class="row d-flex justify-content-center g-4 m-0 p-0 "> 
                <div class="col-12 col-sm-6 col-xl-4 p-0 m-0">
                    <div class="coleccionCardDis" style="background-image: url(../img/colecciones/) center center /cover;">
                        <div class="textoColDis">
                            <h4>Colección: "Alt Gore"</h4>
                        </div>
                    </div>
                </div>
                
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            Artículos
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <div class="container-fluid">
            <div class="row my-5">
                <?php foreach($articulos as $articulo) { ?>
                <div class="col-6 col-lg-4 col-xl-3 columnaItem mx-auto">
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
        </div>
        </div>
    </div>
    

    </section>

<?php include_once("./footer.php");?>