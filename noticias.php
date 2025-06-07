<?php include_once("./header.php");
include_once("./conexion.php");
// Obtener noticias recientes
$noticias = $gbd->query("SELECT * FROM noticias_tb ORDER BY fecha DESC")->fetchAll(PDO::FETCH_ASSOC);

?>

    <main>
        <section id="destacadas" class="container-fluid">
            <div class="row py-4">
                <div class="col-12">
                    <h3 class="tituloGrand">Noticias</h3>
                </div>
            </div>

            <div class="row py-3">
                <div class="col-12 subtituloNoticias">
                    <h4>Destacadas</h4>
                </div>
            </div>

            <div class="row pb-3">
                <div class="col-12 col-md-6">
                    <div class="novedadCard noticia2000">
                        <div class="textoNov">
                            <h4>El efecto 2000 de la moda</h4>
                            <p>EL Y2K es el nombre del temido fallo informático...</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="novedadCard noticiaScene">
                        <div class="textoNov">
                            <h4>Vuelve 'scene'</h4>
                            <p>Un puñado de 'influencers' y antihéroes...</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section id="recientes" class="container-fluid">
            <div class="row pt-5 pb-3">
                <div class="col-12 subtituloNoticias">
                    <h4>Más recientes</h4>
                </div>
            </div>
            
                
            <div class="row">
                <?php foreach($noticias as $noticia): ?>
                <div class="col-12 my-3 cartaNoticia">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="contenedorImgNoticia">
                                    <img src="./img/noticias/<?= htmlspecialchars($noticia['imagen']) ?>" alt="<?= htmlspecialchars($noticia['titulo']) ?>">
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 textoNoticia">
                                <h3><?= htmlspecialchars($noticia['titulo']) ?></h3>
                                <h4><?= htmlspecialchars($noticia['subtitulo']) ?></h4>
                                <p>
                                    <?php
                                    $contenido = $noticia['contenido'] ?? '';
                                    echo mb_substr($contenido, 0, 600) . (mb_strlen($contenido) > 200 ? '...' : '');
                                    ?>
                                </p>
                                <a href="noticia.php?id=<?= $noticia['id'] ?>">Leer noticia completa</a>
                                <p class="my-4">
                                    <?php
                                    $fecha = $noticia['fecha'] ?? '';
                                    if ($fecha) {
                                        $fechaObj = new DateTime($fecha);
                                        echo $fechaObj->format('d-m-Y');
                                    }
                                    ?>
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
                
            

        </section>
    </main>

<?php include_once("./footer.php")?>