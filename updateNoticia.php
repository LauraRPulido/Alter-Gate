<?php
session_start();
require_once('./functions.php');
if(isset($_COOKIE['id'])){
    $_SESSION['id'] = $_COOKIE['id'];
}
if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit;
}
require_once("./conexion.php");

$id_user = $_SESSION['id'];

$id_noticia = isset($_GET['id']) ? intval($_GET['id']) : 0;
$noticia = null;
if ($id_noticia > 0) {
    $stmt = $gbd->prepare("SELECT * FROM noticias_tb WHERE id = ? AND id_user = ?");
    $stmt->execute([$id_noticia, $id_user]);
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$noticia) {
        header('Location:admin.php');
        exit;
    }
} else {
    header('Location:admin.php');
    exit;
}

if($_POST){
    $titulo = $_POST['titulo'] ?? '';
    $subtitulo = $_POST['subtitulo'] ?? '';
    $contenido = $_POST['contenido'] ?? '';
    $fecha = $noticia['fecha'];
    $imagen = $noticia['imagen'];
    // MANEJO IMAFEN
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
        $imagen = $_FILES['imagen']['name'];
        $ruta = "img/noticias/" . $imagen;
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }
    
    $stmt = $gbd->prepare("UPDATE noticias_tb SET titulo=?, subtitulo=?, contenido=?, imagen=? WHERE id=? AND id_user=?");
    $ok = $stmt->execute([$titulo, $subtitulo, $contenido, $imagen, $id_noticia, $id_user]);
    if($ok){
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo">
        <h2 class="mb-4">Editar Noticia</h2>
        <form action="?id=<?= htmlspecialchars($id_noticia) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required value="<?= htmlspecialchars($noticia['titulo']) ?>">
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo</label>
                <input type="text" name="subtitulo" id="subtitulo" class="form-control" required value="<?= htmlspecialchars($noticia['subtitulo']) ?>">
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="6" required><?= htmlspecialchars($noticia['contenido']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen <?= $noticia['imagen'] ? '(actual: ' . htmlspecialchars($noticia['imagen']) . ')' : '' ?></label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
