<?php 
session_start();
require_once("./conexion.php");
if(isset($_COOKIE['id'])){
    $_SESSION['id'] = $_COOKIE['id'];
}
if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit;
}
$id_user = $_SESSION['id'];

$stmtNoticias = $gbd->prepare("SELECT * FROM noticias_tb WHERE id_user = ? ORDER BY fecha DESC");
$stmtNoticias->execute([$id_user]);
$noticias = $stmtNoticias->fetchAll(PDO::FETCH_ASSOC);

$stmtArticulos = $gbd->prepare("SELECT * FROM articulos_tb WHERE id_user = ? ORDER BY id DESC");
$stmtArticulos->execute([$id_user]);
$articulos = $stmtArticulos->fetchAll(PDO::FETCH_ASSOC);

$stmtColecciones = $gbd->prepare("SELECT * FROM colecciones_tb WHERE id_user = ? ORDER BY id DESC");
$stmtColecciones->execute([$id_user]);
$colecciones = $stmtColecciones->fetchAll(PDO::FETCH_ASSOC);

$stmtUser = $gbd->prepare("SELECT * FROM users_tb WHERE id = ?");
$stmtUser->execute([$id_user]);
$user = $stmtUser->fetch(PDO::FETCH_ASSOC);
?>
<?php include_once("./header.php");?>
    
  <section id="bannerDis">
        <div class="container-fluid d-flex justify-content-center px-4">
          <div class="container-fluid bannerDis px-5 py-2">
            <div class="row py-3 d-flex align-items-center flex-column flex-lg-column flex-xl-row justify-content-xl-between">
              <div class="col-auto">
                <a href="">
                  <div class="contenedorPerfil">
                      <img src="./img/<?= htmlspecialchars($user['imgUser'] ?? 'diseñadorEmilio.jpg') ?>" alt="<?= htmlspecialchars($user['username'] ?? '') ?>" class="imagenCirculo">
                  </div>
                </a>    
              </div>
              <div class="col  col-xl-6 my-3 perfilDis text-center text-lg-center text-xl-start">
                  <h4><?= htmlspecialchars($user['username'] ?? '') ?></h4>
                  <p><?= htmlspecialchars($user['bio'] ?? 'Sin biografía.') ?></p>
                  <a class="text-light f-small fw-light" href="mailto:<?= htmlspecialchars($user['enlace'] ?? '') ?>"><?= htmlspecialchars($user['enlace'] ?? '') ?></a>
                  <div class="d-flex flex-column flex-md-row justify-content-center justify-content-xl-start  w-100">
                      <a class="btn botonEditarPerf" href="updateUser.php"><p>Editar Perfil</p></a>
                      <a class="btn botonCerrarSesion ms-2" href="logout.php"><p>Cerrar sesión</p></a>
                  </div>
              </div>
              <div class="d-flex col-12 col-xl-auto text-center text-xl-start justify-content-center gap-3">
                  <div class="contContadores">
                      <p>Me gusta</p>
                      <h5><?= htmlspecialchars($user['likes'] ?? '0') ?><span></h5>
                  </div>
                  <div class="contContadores">
                      <p>Artículos</p>
                      <h5><?= count($articulos) ?></h5>
                  </div>
                  <div class="contContadores">
                      <p>Colecciones</p>
                      <h5><?= count($colecciones) ?></h5>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </section>

  <section id="addBotones">

    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-sm-4"><a href="addArticulo.php" class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Artículo</h5></a></div>
        <div class="col-12 col-sm-4 mt-4 mt-sm-0"><a href="addColeccion.php" class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Colección</h5></a></div>
        <div class="col-12 col-sm-4 mt-4 mt-sm-0"><a href="addNoticia.php" class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Noticia</h5></a></div>
      </div>

    </div>

  </section>
  
  <section id="desplegable">
     
    <div class="accordion px-3 px-xl-5 my-5" id="mainAccordion">
    
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne">
            Colecciones
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
          <div class="accordion-body container-fluid">
            <div class="row d-flex justify-content-center g-4 m-0 p-0">
              <?php foreach($colecciones as $coleccion) { ?>
                <div class="col-12 col-sm-6 col-xl-4 p-0 m-0">
                  <a href="coleccion.php?id=<?= htmlspecialchars($coleccion['id']) ?>">
                    <div class="coleccionCardDis mb-0" style="background-image: url('./img/colecciones/<?= htmlspecialchars($coleccion['imagen']) ?>'); background-position: center; background-size: cover;">
                      <div class="textoColDis">
                        <h4>"<?= htmlspecialchars($coleccion['nombre_coleccion']) ?>"</h4>
                      </div>
                    </div>
                  </a>
                  <div class="d-flex justify-content-evenly mb-5">
                    <a class="btn botonEditar" href="updateColeccion.php?id=<?= htmlspecialchars($coleccion['id']) ?>"><p>Editar</p></a>
                    <a class="btn botonEliminar" onclick="borrado('coleccion', <?= $coleccion['id'] ?>)"><p>Eliminar</p></a>
                  </div>
                </div>
              <?php } ?>
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
                  <div class="columnaItemAd col-6 col-lg-4 col-xl-3 mx-auto d-flex flex-column align-items-center justify-content-center">
                    <div class="contenedorImagenItem">
                      <a href="articulo.php?id=<?= htmlspecialchars($articulo['id']) ?>"><img src="./img/imgArticulos/<?= htmlspecialchars($articulo['img_art']) ?>" alt=""></a>
                    </div>
                    <p><?= htmlspecialchars($articulo['nombre_art']) ?></p>
                    <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                      <a class="btn botonEditar mt-0" href="updateArticulo.php?id=<?= htmlspecialchars($articulo['id']) ?>"><p>Editar</p></a>
                      <a class="btn botonEliminar mt-0" onclick="borrado('articulo', <?= $articulo['id'] ?>)"><p>Eliminar</p></a>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            Noticias
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <div class="container-fluid">
              <div class="row pb-3">
                <?php foreach($noticias as $noticia): ?>
                  <div class="col-12 col-md-6 p-0 mx-auto">
                    <a href="noticia.php?id=<?= htmlspecialchars($noticia['id']) ?>">
                      <div class="noticiaAd mb-0" style="background: url('./img/noticias/<?= htmlspecialchars($noticia['imagen']) ?>') center center /cover;">
                          <div class="textoNov">
                              <h4><?= htmlspecialchars($noticia['titulo']) ?></h4>
                              <p><?php
                                $contenido = $noticia['contenido'] ?? '';
                                echo mb_substr($contenido, 0, 100) . (mb_strlen($contenido) > 200 ? '...' : '');
                                ?></p>
                          </div>
                      </div>
                    </a>
                      <div class="d-flex flex-column flex-md-row justify-content-evenly w-100 mb-5">
                          <a class="btn botonEditar" href="updateNoticia.php?id=<?= htmlspecialchars($noticia['id']) ?>"><p>Editar</p></a>
                          <a class="btn botonEliminar" onclick="borrado('noticia', <?= $noticia['id'] ?>)"><p>Eliminar</p></a>
                      </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
function borrado(tipo, idBorrado){
    let ok = confirm("¿Estás seguro de borrar este registro?" + idBorrado);
    if(ok){
        window.location = "deleteContenidos.php?tipo=" + tipo + "&id=" + idBorrado;
    }
}
</script>
  
<?php include_once("./footer.php");?>