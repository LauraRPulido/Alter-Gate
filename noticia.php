<?php 
include_once("./header.php");
include_once("./conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $gbd->prepare("SELECT noticias_tb.*, users_tb.imgUser, users_tb.username, users_tb.id as id_user FROM noticias_tb LEFT JOIN users_tb ON noticias_tb.id_user = users_tb.id WHERE noticias_tb.id = ?");
    $stmt->execute([$id]);
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php if ($noticia): ?>
    <section class="bannerNoticiaIndividual position-relative w-100" style="background: url('./img/noticias/<?= htmlspecialchars($noticia['imagen']) ?>') center center/cover;">
    </section>
    <section id="noticia" class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="textoNoticiaIndividual">
                    <h2><?= htmlspecialchars($noticia['titulo']) ?></h2>
                    <h4><?= htmlspecialchars($noticia['subtitulo']) ?></h4>
                    <p><?= nl2br(htmlspecialchars($noticia['contenido'])) ?></p>
                    <p class="text-muted" style="font-size:0.95em;">
                        <?php 
                        $fecha = $noticia['fecha'] ?? '';
                        if ($fecha) {
                            $fechaObj = new DateTime($fecha);
                            echo $fechaObj->format('d-m-Y');
                        }
                        ?>
                    </p>
                </div>
                <?php if (!empty($noticia['id_user'])): ?>
                <a href="diseñador.php?id=<?= $noticia['id_user'] ?>" class="tarjetaAutorNoticia mt-5 d-inline-block text-decoration-none">
                    <div class="d-flex align-items-center">
                        <div class="imgContenedorAutor me-3">
                            <img src="./img/<?= htmlspecialchars($noticia['imgUser']) ?>" alt="<?= htmlspecialchars($noticia['username']) ?>">
                        </div>
                        <div class="infoAutor">
                            <h5 class="mb-0"><?= htmlspecialchars($noticia['username']) ?></h5>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="container py-5"><div class="alert alert-warning">Noticia no encontrada.</div></section>
<?php endif; ?>
<?php include_once("./footer.php"); ?>