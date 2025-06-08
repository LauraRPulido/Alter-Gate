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

// Obtener datos del usuario logueado
$id_user = $_SESSION['id'];

if($_POST){
    $titulo = $_POST['titulo'] ?? '';
    $subtitulo = $_POST['subtitulo'] ?? '';
    $contenido = $_POST['contenido'] ?? '';
    $fecha = date('Y-m-d'); // Siempre la fecha actual
    $imagen = '';
    // Manejo de imagen
    if(isset($_FILES['imagen'])){
        $imagen = $_FILES['imagen']['name'];
        $ruta = "img/noticias/" . $imagen;
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }
    // Insertar noticia
    $stmt = $gbd->prepare("INSERT INTO noticias_tb (titulo, subtitulo, contenido, fecha, imagen, id_user) VALUES (?, ?, ?, ?, ?, ?)");
    $ok = $stmt->execute([$titulo, $subtitulo, $contenido, $fecha, $imagen, $id_user]);
    if($ok){
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo">
        <h2 class="mb-4">Añadir Noticia</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo</label>
                <input type="text" name="subtitulo" id="subtitulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="6" required></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Guardar">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
