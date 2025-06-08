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

// Obtener estilos para el selector
$estilos = [];
$stmtEstilos = $gbd->prepare("SELECT id, nombre_estilo, icono FROM estilos_tb ORDER BY nombre_estilo ASC");
$stmtEstilos->execute();
$estilos = $stmtEstilos->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    $nombre_art = $_POST['nombre_art'] ?? '';
    $descripcion_art = $_POST['descripcion_art'] ?? '';
    $enlace_art = $_POST['enlace_art'] ?? '';
    $id_estilo = $_POST['id_estilo'] ?? null;
    $img_art = '';

    // Manejo de imagen
    if(isset($_FILES['img_art']) && $_FILES['img_art']['error'] === UPLOAD_ERR_OK){
        $img_art = $_FILES['img_art']['name'];
        $ruta = "img/imgArticulos/" . $img_art;
        $rutaTemporal = $_FILES['img_art']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }

    // Insertar artículo
    $stmt = $gbd->prepare("INSERT INTO articulos_tb (nombre_art, descripcion_art, enlace_art, img_art, id_user, id_estilo) VALUES (?, ?, ?, ?, ?, ?)");
    $ok = $stmt->execute([$nombre_art, $descripcion_art, $enlace_art, $img_art, $id_user, $id_estilo]);
    if($ok){
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div  class="container addArticulo">
        
        <h2 class="mb-4">Añadir Artículo</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre_art" class="form-label">Nombre del artículo</label>
                <input type="text" name="nombre_art" id="nombre_art" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_art" class="form-label">Descripción</label>
                <textarea name="descripcion_art" id="descripcion_art" class="form-control" rows="4" required></textarea>
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
                <label for="enlace_art" class="form-label">Enlace (opcional)</label>
                <input type="url" name="enlace_art" id="enlace_art" class="form-control">
            </div>
            <div class="mb-3">
                <label for="img_art" class="form-label">Imagen</label>
                <input type="file" name="img_art" id="img_art" class="form-control" required>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Guardar">
                <input type="reset" class="btn btn-secondary" value="Limpiar">
            </div>
        </form>

    </div>
</main>
<?php include_once("./footer.php"); ?>
