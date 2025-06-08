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

$estilos = [];
$stmtEstilos = $gbd->prepare("SELECT id, nombre_estilo, icono FROM estilos_tb ORDER BY nombre_estilo ASC");
$stmtEstilos->execute();
$estilos = $stmtEstilos->fetchAll(PDO::FETCH_ASSOC);

$id_articulo = isset($_GET['id']) ? intval($_GET['id']) : 0;
$articulo = null;
if ($id_articulo > 0) {
    $stmt = $gbd->prepare("SELECT * FROM articulos_tb WHERE id = ? AND id_user = ?");
    $stmt->execute([$id_articulo, $id_user]);
    $articulo = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$articulo) {
        header('Location:admin.php');
        exit;
    }
} else {
    header('Location:admin.php');
    exit;
}

if($_POST){
    $nombre_art = $_POST['nombre_art'] ?? '';
    $descripcion_art = $_POST['descripcion_art'] ?? '';
    $enlace_art = $_POST['enlace_art'] ?? '';
    $id_estilo = $_POST['id_estilo'] ?? null;
    $img_art = $articulo['img_art'];

    if(isset($_FILES['img_art']) && $_FILES['img_art']['error'] === UPLOAD_ERR_OK){
        $img_art = $_FILES['img_art']['name'];
        $ruta = "img/imgArticulos/" . $img_art;
        $rutaTemporal = $_FILES['img_art']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }

    $stmt = $gbd->prepare("UPDATE articulos_tb SET nombre_art=?, descripcion_art=?, enlace_art=?, img_art=?, id_estilo=? WHERE id=? AND id_user=?");
    $ok = $stmt->execute([$nombre_art, $descripcion_art, $enlace_art, $img_art, $id_estilo, $id_articulo, $id_user]);
    if($ok){
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo">
        <h2 class="mb-4">Editar Artículo</h2>
        <form action="?id=<?= htmlspecialchars($id_articulo) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre_art" class="form-label">Nombre del artículo</label>
                <input type="text" name="nombre_art" id="nombre_art" class="form-control" required value="<?= htmlspecialchars($articulo['nombre_art']) ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion_art" class="form-label">Descripción</label>
                <textarea name="descripcion_art" id="descripcion_art" class="form-control" rows="4" required><?= htmlspecialchars($articulo['descripcion_art']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="id_estilo" class="form-label">Estilo</label>
                <select name="id_estilo" id="id_estilo" class="form-control" required>
                    <option value="" disabled>Selecciona un estilo</option>
                    <?php foreach($estilos as $estilo): ?>
                        <option value="<?= htmlspecialchars($estilo['id']) ?>" <?= $articulo['id_estilo'] == $estilo['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($estilo['nombre_estilo']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="enlace_art" class="form-label">Enlace (opcional)</label>
                <input type="url" name="enlace_art" id="enlace_art" class="form-control" value="<?= htmlspecialchars($articulo['enlace_art']) ?>">
            </div>
            <div class="mb-3">
                <label for="img_art" class="form-label">Imagen <?= $articulo['img_art'] ? '(actual: ' . htmlspecialchars($articulo['img_art']) . ')' : '' ?></label>
                <input type="file" name="img_art" id="img_art" class="form-control">
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
