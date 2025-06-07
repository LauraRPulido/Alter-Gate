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
              <div class="col-12 col-sm-6 col-xl-4 p-0 m-0">
                <div class="coleccionCardDis" style="background-image: url('../img/colecciones/') center center /cover;">
                  <div class="textoColDis">
                    <h4>Colección: "Alt Gore"</h4>
                  </div>
                </div>
                <div class="d-flex justify-content-evenly">
                  <a href="" onclick ="borrado()" class="btn botonEditar"><p>Editar</p></a>
                  <a href="" onclick ="borrado()" class="btn botonEliminar"><p>Eliminar</p></a>
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

                <div class="columnaItemAd col-6 col-lg-4 col-xl-3">
                    <div class="contenedorImagenItem">
                      <img src="./img/imgArticulos/camiseta-de-manga-larga-silver-heart-minga-london.jpg" alt="">
                    </div>
                    <p>Camiseta de Manga Larga Silver Heart - Minga London</p>
                    <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                      <a class="btn botonEditar"><p>Editar</p></a>
                      <a class="btn botonEliminar"><p>Eliminar</p></a>
                    </div>
                  
                </div>
              

                <div class="columnaItemAd col-6 col-lg-4 col-xl-3">
                    <div class="contenedorImagenItem">
                      <img src="./img/imgArticulos/camiseta-de-manga-larga-silver-heart-minga-london.jpg" alt="">
                    </div>
                    <p>Camiseta de Manga Larga Silver Heart - Minga London</p>
                    <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                      <a class="btn botonEditar"><p>Editar</p></a>
                      <a class="btn botonEliminar"><p>Eliminar</p></a>
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
            Noticias
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
          <div class="accordion-body">
            <div class="container-fluid">
          
              <div class="row pb-3">
                  <div class="col-12 col-md-6 p-0">
                      <div class="noticiaAd">
                          <div class="textoNov">
                              <h4>El efecto 2000 de la moda</h4>
                              <p>EL Y2K es el nombre del temido fallo informático...</p>
                          </div>
                      </div>
                      <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                          <a class="btn botonEditar"><p>Editar</p></a>
                          <a class="btn botonEliminar"><p>Eliminar</p></a>
                      </div>
                  </div>

                  <div class="col-12 col-md-6 p-0">
                      <div class="noticiaAd" style="background: url();">
                          <div class="textoNov">
                              <h4>Vuelve 'scene'</h4>
                              <p>Un puñado de 'influencers' y antihéroes saefe esaf  fewf dawef.</p>
                          </div>
                      </div>
                      <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                          <a class="btn botonEditar"><p>Editar</p></a>
                          <a class="btn botonEliminar"><p>Eliminar</p></a>
                      </div>
                  </div>
                  <div class="col-12 col-md-6 p-0">
                      <div class="noticiaAd" style="background: url();">
                          <div class="textoNov">
                              <h4>Vuelve 'scene'</h4>
                              <p>Un puñado de 'influencers' y antihéroes...</p>
                          </div>
                      </div>
                      <div class="d-flex flex-column flex-md-row justify-content-evenly w-100">
                          <a class="btn botonEditar"><p>Editar</p></a>
                          <a class="btn botonEliminar"><p>Eliminar</p></a>
                      </div>
                  </div>
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