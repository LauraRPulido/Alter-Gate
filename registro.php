<?php
session_start();
require_once("./conexion.php");
require_once("./functions.php");

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $mensaje = registrar($gbd, $username, $password);
    // Si el registro fue correcto, loguear automáticamente
    if ($mensaje === 'Registro correcto') {
        $stmt = $gbd->prepare("SELECT * FROM users_tb WHERE username = ?");
        $stmt->execute([$username]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            $_SESSION['id'] = $usuario['id'];
            setcookie('id', $usuario['id'], time() + 3600 * 24 * 7, '/');
            header('Location:admin.php');
            exit;
        }
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo" style="max-width: 400px;">
        <h2 class="mb-4">Registro</h2>
        <?php if ($mensaje): ?>
            <div class="alert alert-info"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
