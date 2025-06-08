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

// Obtener estilos para el selector
$estilos = [];
$stmtEstilos = $gbd->prepare("SELECT id, nombre_estilo, icono FROM estilos_tb ORDER BY nombre_estilo ASC");
$stmtEstilos->execute();
$estilos = $stmtEstilos->fetchAll(PDO::FETCH_ASSOC);

// Obtener artículos del usuario para el selector
$articulos_usuario = [];
$stmtArt = $gbd->prepare("SELECT id, nombre_art FROM articulos_tb WHERE id_user = ? ORDER BY id DESC LIMIT 20");
$stmtArt->execute([$id_user]);
$articulos_usuario = $stmtArt->fetchAll(PDO::FETCH_ASSOC);

$id_coleccion = isset($_GET['id']) ? intval($_GET['id']) : 0;
$coleccion = null;
$articulos_seleccionados = [];
if ($id_coleccion > 0) {
    $stmt = $gbd->prepare("SELECT * FROM colecciones_tb WHERE id = ? AND id_user = ?");
    $stmt->execute([$id_coleccion, $id_user]);
    $coleccion = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$coleccion) {
        header('Location:admin.php');
        exit;
    }
    // Obtener artículos ya asociados a la colección
    $stmtSel = $gbd->prepare("SELECT id_articulo FROM coleccion_articulo_tb WHERE id_coleccion = ?");
    $stmtSel->execute([$id_coleccion]);
    $articulos_seleccionados = array_column($stmtSel->fetchAll(PDO::FETCH_ASSOC), 'id_articulo');
} else {
    header('Location:admin.php');
    exit;
}

if($_POST){
    $nombre_coleccion = $_POST['nombre_coleccion'] ?? '';
    $descripcion_coleccion = $_POST['descripcion_coleccion'] ?? '';
    $id_estilo = $_POST['id_estilo'] ?? null;
    $imagen = $coleccion['imagen'];
    $articulos_post = $_POST['articulos'] ?? [];

    // Manejo de imagen
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
        $imagen = $_FILES['imagen']['name'];
        $ruta = "img/colecciones/" . $imagen;
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }

    // Actualizar colección
    $stmt = $gbd->prepare("UPDATE colecciones_tb SET nombre_coleccion=?, descripcion=?, imagen=?, id_estilo=? WHERE id=? AND id_user=?");
    $ok = $stmt->execute([$nombre_coleccion, $descripcion_coleccion, $imagen, $id_estilo, $id_coleccion, $id_user]);
    if($ok){
        // Actualizar relación artículos-colección (eliminar y volver a insertar)
        $stmtDel = $gbd->prepare("DELETE FROM coleccion_articulo_tb WHERE id_coleccion = ?");
        $stmtDel->execute([$id_coleccion]);
        if (!empty($articulos_post)) {
            $stmtRel = $gbd->prepare("INSERT INTO coleccion_articulo_tb (id_coleccion, id_articulo) VALUES (?, ?)");
            foreach($articulos_post as $id_articulo) {
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
        <h2 class="mb-4">Editar Colección</h2>
        <form action="?id=<?= htmlspecialchars($id_coleccion) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre_coleccion" class="form-label">Nombre de la colección</label>
                <input type="text" name="nombre_coleccion" id="nombre_coleccion" class="form-control" required value="<?= htmlspecialchars($coleccion['nombre_coleccion']) ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion_coleccion" class="form-label">Descripción</label>
                <textarea name="descripcion_coleccion" id="descripcion_coleccion" class="form-control" rows="4" required><?= htmlspecialchars($coleccion['descripcion']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="id_estilo" class="form-label">Estilo</label>
                <select name="id_estilo" id="id_estilo" class="form-control" required>
                    <option value="" disabled>Selecciona un estilo</option>
                    <?php foreach($estilos as $estilo): ?>
                        <option value="<?= htmlspecialchars($estilo['id']) ?>" <?= $coleccion['id_estilo'] == $estilo['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($estilo['nombre_estilo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen <?= $coleccion['imagen'] ? '(actual: ' . htmlspecialchars($coleccion['imagen']) . ')' : '' ?></label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <div class="mb-3">
                <label for="articulos" class="form-label">Selecciona artículos para la colección (máx. 20)</label>
                <select name="articulos[]" id="articulos" class="form-control" multiple size="6">
                    <?php foreach($articulos_usuario as $art): ?>
                        <option value="<?= htmlspecialchars($art['id']) ?>" <?= in_array($art['id'], $articulos_seleccionados) ? 'selected' : '' ?>><?= htmlspecialchars($art['nombre_art']) ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Mantén pulsado Ctrl (Windows) o Cmd (Mac) para seleccionar varios.</small>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
