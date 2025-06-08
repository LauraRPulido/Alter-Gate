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


$stmt = $gbd->prepare("SELECT username, bio, imgUser, enlace FROM users_tb WHERE id = ?");
$stmt->execute([$id_user]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$user){
    header('Location:admin.php');
    exit;
}

if($_POST){
    $username = $_POST['username'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $enlace = $_POST['enlace'] ?? '';
    $imgUser = $user['imgUser'];
    if(isset($_FILES['imgUser']) && $_FILES['imgUser']['error'] === UPLOAD_ERR_OK){
        $imgUser = $_FILES['imgUser']['name'];
        $ruta = "img/" . $imgUser;
        $rutaTemporal = $_FILES['imgUser']['tmp_name'];
        move_uploaded_file($rutaTemporal, $ruta);
    }
    $stmt = $gbd->prepare("UPDATE users_tb SET username=?, bio=?, imgUser=?, enlace=? WHERE id=?");
    $ok = $stmt->execute([$username, $bio, $imgUser, $enlace, $id_user]);
    if($ok){
        header("Location:admin.php");
        exit;
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo">
        <h2 class="mb-4">Editar Perfil</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" name="username" id="username" class="form-control" required value="<?= htmlspecialchars($user['username']) ?>">
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Biografía</label>
                <textarea name="bio" id="bio" class="form-control" rows="4" required><?= htmlspecialchars($user['bio']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="enlace" class="form-label">Enlace (opcional)</label>
                <input type="url" name="enlace" id="enlace" class="form-control" value="<?= htmlspecialchars($user['enlace'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label for="imgUser" class="form-label">Imagen de perfil <?= $user['imgUser'] ? '(actual: ' . htmlspecialchars($user['imgUser']) . ')' : '' ?></label>
                <input type="file" name="imgUser" id="imgUser" class="form-control">
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="admin.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
