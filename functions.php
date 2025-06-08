<?php
require_once('./conexion.php');
function registrar($gbd, $user, $pass) {
    $sentencia = $gbd->prepare("SELECT username FROM users_tb WHERE username = ?");
    $sentencia->execute([$user]);
    if ($sentencia->fetch()) {
        return "El usuario ya existe.";
    }
    $contra_protegida = password_hash($pass, PASSWORD_DEFAULT);
    $imgUser = 'iconDefault.jpg';
    $sentencia = $gbd->prepare("INSERT INTO users_tb (username, password, imgUser) VALUES (?, ?, ?)");
    if ($sentencia->execute([$user, $contra_protegida, $imgUser])) {
        return "Registro correcto";
    }
    return "Ocurrió algún error en el registro";
}

function login($gbd, $user, $pass, $rec) {
    $sentencia = $gbd->prepare("SELECT * FROM users_tb WHERE username = ?");
    $sentencia->execute([$user]);
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
    if ($usuario && password_verify($pass, $usuario['password'])) {
        session_start();
        $_SESSION['id'] = $usuario['id'];
        if ($rec == true) {
            setcookie('id', $usuario['id'], time() + 3600 * 24 * 7, '/');
        }
        header('Location:admin.php');
        exit;
    }
    return "El usuario o la contraseña no son correctos";
}
?>