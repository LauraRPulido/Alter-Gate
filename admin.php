<?php 
require_once("./conexion.php");
$noticias = [];
$articulos = [];
$colecciones = [];
// Noticias
$stmtNoticias = $gbd->prepare("SELECT noticias_tb.* FROM noticias_tb INNER JOIN users_tb ON noticias_tb.id_user = users_tb.id ORDER BY fecha DESC");
$stmtNoticias->execute();
$noticias = $stmtNoticias->fetchAll(PDO::FETCH_ASSOC);
// Artículos
$stmtArticulos = $gbd->prepare("SELECT articulos_tb.* FROM articulos_tb INNER JOIN users_tb ON articulos_tb.id_user = users_tb.id ORDER BY articulos_tb.id DESC");
$stmtArticulos->execute();
$articulos = $stmtArticulos->fetchAll(PDO::FETCH_ASSOC);
// Colecciones
$stmtColecciones = $gbd->prepare("SELECT colecciones_tb.* FROM colecciones_tb INNER JOIN users_tb ON colecciones_tb.id_user = users_tb.id ORDER BY colecciones_tb.id DESC");
$stmtColecciones->execute();
$colecciones = $stmtColecciones->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once("./header.php");?>
    
  <section id="bannerDis">

        <div class="container-fluid d-flex justify-content-center px-4">
           
          <div class="container-fluid bannerDis px-5 py-2">
            <div class="row py-3 d-flex align-items-center flex-column flex-lg-column flex-xl-row justify-content-xl-between">
              <div class="col-auto">
                  <div class="contenedorPerfil">
                      <img src="./img/diseñadorEmilio.jpg" alt="" class="imagenCirculo">
                  </div>    
              </div>

              <div class="col  col-xl-6 my-3 perfilDis text-center text-lg-center text-xl-start">
                  <h4>Emilio Fernández</h4>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus doloremque temporibus animi, accusantium dolorum asperiores aut. Error earum excepturi voluptas tempore a! Dolor.</p>
                  <a href="">wdwd</a>
                  <div class="d-flex flex-column flex-md-row justify-content-center justify-content-xl-start  w-100">
                      <a class="btn botonEditarPerf"><p>Editar Perfil</p></a>
                  </div>
              </div>

              <div class="d-flex col-12 col-xl-auto text-center text-xl-start justify-content-center gap-3">
                  <div class="contContadores">
                      <p>Me gusta</p>
                      <h5>120<span></h5>
                      
                  </div>
                  <div class="contContadores">
                      <p>Artículos</p>
                      <h5>120</h5>
                      
                  </div>
                  <div class="contContadores">
                      <p>Colecciones</p>
                      <h5>120</h5>
                  </div>
              </div>
                        

          </div>
        </div>

        
  </section>

  <section id="addBotones">

    <div class="container">
      <div class="row text-center">
        <div class="col-12 col-sm-4"><a class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Artículo</h5></a></div>
        <div class="col-12 col-sm-4 mt-4 mt-sm-0"><a class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Colección</h5></a></div>
        <div class="col-12 col-sm-4 mt-4 mt-sm-0"><a class="btn botonAñadir"><i class="bi bi-plus-circle-fill d-block"></i><h5>Noticia</h5></a></div>
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
                  <div class="coleccionCardDis" style="background-image: url('./img/colecciones/<?= htmlspecialchars($coleccion['imagen']) ?>'); background-position: center; background-size: cover;">
                    <div class="textoColDis">
                      <h4>Colección: "<?= htmlspecialchars($coleccion['nombre_coleccion']) ?>"</h4>
                    </div>
                  </div>
                  <div class="d-flex justify-content-evenly">
                    <a href="" onclick ="borrado()" class="btn botonEditar"><p>Editar</p></a>
                    <a href="" onclick ="borrado()" class="btn botonEliminar"><p>Eliminar</p></a>
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
                  <div class="columnaItemAd col-6 col-lg-4 col-xl-3 mx-auto">
                    <div class="contenedorImagenItem">
                      <img src="./img/imgArticulos/<?= htmlspecialchars($articulo['img_art']) ?>" alt="">
                    </div>
                    <p><?= htmlspecialchars($articulo['nombre_art']) ?></p>
                    <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                      <a class="btn botonEditar"><p>Editar</p></a>
                      <a class="btn botonEliminar"><p>Eliminar</p></a>
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
                      <div class="noticiaAd" style="background: url('./img/noticias/<?= htmlspecialchars($noticia['imagen']) ?>') center center /cover;">
                          <div class="textoNov">
                              <h4><?= htmlspecialchars($noticia['titulo']) ?></h4>
                              <p><?php
                                $contenido = $noticia['contenido'] ?? '';
                                echo mb_substr($contenido, 0, 100) . (mb_strlen($contenido) > 200 ? '...' : '');
                                ?></p>
                          </div>
                      </div>
                      <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                          <a class="btn botonEditar"><p>Editar</p></a>
                          <a class="btn botonEliminar"><p>Eliminar</p></a>
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
  	function borrado(idBorrado){
			let ok = confirm("¿Estás seguro de borrar este registro?" + idBorrado);

			if(ok){
				window.location = "deleteEntrada.php?id_entrada=" + idBorrado;
			}
		}
</script>
  
<?php include_once("./footer.php");?>