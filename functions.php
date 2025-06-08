<?php
require_once('./conexion.php');
function registrar($gbd,$user,$pass,$email){
    $sentencia = $gbd->prepare("SELECT username FROM usuarios_tb WHERE username = ?");
    $sentencia->execute([$user]);

    if($sentencia->fetch()){
        return "El usuario ya existe.";
    }

    $contra_protegida = password_hash($pass, PASSWORD_DEFAULT);
    
    $sentencia = $gbd->prepare("INSERT INTO usuarios_tb VALUES (null,?,?,?)");
    
    if($sentencia->execute([$user,$contra_protegida,$email])){
        return "Registro correcto";
    }
    return "Ocurrio algún error en el registro";
   
}
function login($gbd,$user,$pass,$rec){
    
    $sentencia = $gbd->prepare("SELECT * FROM users_tb WHERE username = ?");
    $sentencia->execute([$user]);
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);

    if($usuario && password_verify($pass,$usuario['password'])){
        session_start();
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        if($rec == true){
            setcookie('id_usuario',$usuario['id_usuario'],time()+3600);
        }
        header('Location:admin.php');
    }
    return "El usuario o la contraseña no son correctos";
}


?>