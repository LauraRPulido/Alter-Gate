<?php
session_start();
require_once("./conexion.php");
require_once("./functions.php");

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $recordar = isset($_POST['recordar']);

    $stmt = $gbd->prepare("SELECT * FROM users_tb WHERE username = ?");
    $stmt->execute([$username]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario && $password === $usuario['password']) {
        $_SESSION['id'] = $usuario['id'];
        if ($recordar) {
            setcookie('id', $usuario['id'], time() + 3600 * 24 * 7, '/');
        }
        header('Location:admin.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>
<?php include_once("./header.php"); ?>
<main id="addContainer">
    <div class="container addArticulo" style="max-width: 400px;">
        <h2 class="mb-4">Iniciar Sesión</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
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
            <div class="mb-3 form-check">
                <input type="checkbox" name="recordar" id="recordar" class="form-check-input">
                <label for="recordar" class="form-check-label">Recordarme</label>
            </div>
            <div class="d-flex gap-3">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
        </form>
    </div>
</main>
<?php include_once("./footer.php"); ?>
