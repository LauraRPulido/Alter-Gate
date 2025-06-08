<?php
session_start();
require_once('./functions.php');
if(isset($_COOKIE['id_usuario'])){
    $_SESSION['id_usuario'] = $_COOKIE['id_usuario'];
}
if(!isset($_SESSION['id_usuario'])){
    header('location:login.html');
    exit;
}

require_once("./conexion.php");

// Obtener datos del usuario logueado
$id_user = $_SESSION['id_usuario'];

// Obtener artículos del usuario para el selector
$articulos_usuario = [];
$stmtArt = $gbd->prepare("SELECT id, nombre_art FROM articulos_tb WHERE id_user = ? ORDER BY id DESC LIMIT 20");
$stmtArt->execute([$id_user]);
$articulos_usuario = $stmtArt->fetchAll(PDO::FETCH_ASSOC);

// Obtener estilos para el selector
$estilos = [];
$stmtEstilos = $gbd->prepare("SELECT id, nombre_estilo, icono FROM estilos_tb ORDER BY nombre_estilo ASC");
$stmtEstilos->execute();
$estilos = $stmtEstilos->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    $nombre_coleccion = $_POST['nombre_coleccion'] ?? '';
    $descripcion_coleccion = $_POST['descripcion_coleccion'] ?? '';
    $id_estilo = $_POST['id_estilo'] ?? null;
    $imagen = '';
    $articulos_seleccionados = $_POST['articulos'] ?? [];

    // Manejo de imagen
    if(isset($_FILES['imagen'])){
        $imagen = $_FILES['imagen']['name'];
        $ruta = "img/colecciones/" . $imagen;
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }

    // Insertar colección
    $stmt = $gbd->prepare("INSERT INTO colecciones_tb (nombre_coleccion, descripcion, imagen, id_user, id_estilo) VALUES (?, ?, ?, ?, ?)");
    $ok = $stmt->execute([$nombre_coleccion, $descripcion_coleccion, $imagen, $id_user, $id_estilo]);
    if($ok){
        $id_coleccion = $gbd->lastInsertId();
       
        if (!empty($articulos_seleccionados)) {
            $stmtRel = $gbd->prepare("INSERT INTO coleccion_articulo_tb (id_coleccion, id_articulo) VALUES (?, ?)");
            foreach($articulos_seleccionados as $id_articulo) {
                $stmtRel->execute([$id_coleccion, $id_articulo]);
            }
        }
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo">
        <h2 class="mb-4">Añadir Colección</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre_coleccion" class="form-label">Nombre de la colección</label>
                <input type="text" name="nombre_coleccion" id="nombre_coleccion" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_coleccion" class="form-label">Descripción</label>
                <textarea name="descripcion_coleccion" id="descripcion_coleccion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="id_estilo" class="form-label">Estilo</label>
                <select name="id_estilo" id="id_estilo" class="form-control" required>
                    <option value="" disabled selected>Selecciona un estilo</option>
                    <?php foreach($estilos as $estilo): ?>
                        <option value="<?= htmlspecialchars($estilo['id']) ?>">
                            <?= htmlspecialchars($estilo['nombre_estilo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="articulos" class="form-label">Selecciona artículos para la colección (máx. 20)</label>
                <select name="articulos[]" id="articulos" class="form-control" multiple size="6">
                    <?php foreach($articulos_usuario as $art): ?>
                        <option value="<?= htmlspecialchars($art['id']) ?>"><?= htmlspecialchars($art['nombre_art']) ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Mantén pulsado Ctrl (Windows) o Cmd (Mac) para seleccionar varios.</small>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Guardar">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
