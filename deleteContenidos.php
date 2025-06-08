<?php
session_start();
require_once("./conexion.php");

if (!isset($_SESSION['id'])) {
    header('location:login.php');
    exit;
}

if (isset($_GET['tipo']) && isset($_GET['id'])) {
    $tipo = $_GET['tipo'];
    $id = intval($_GET['id']);
    $id_user = $_SESSION['id'];
    $tabla = '';
    $campo_id = '';
    $campo_img = '';
    $ruta_img = '';
    $delete_rel = false;
    $rel_query = '';
    $rel_param = null;

    switch ($tipo) {
        case 'articulo':
            $tabla = 'articulos_tb';
            $campo_id = 'id';
            $campo_img = 'img_art';
            $ruta_img = 'img/imgArticulos/';
            break;
        case 'coleccion':
            $tabla = 'colecciones_tb';
            $campo_id = 'id';
            $campo_img = 'imagen';
            $ruta_img = 'img/colecciones/';
            $delete_rel = true;
            $rel_query = 'DELETE FROM coleccion_articulo_tb WHERE id_coleccion = ?';
            $rel_param = $id;
            break;
        case 'noticia':
            $tabla = 'noticias_tb';
            $campo_id = 'id';
            $campo_img = 'imagen';
            $ruta_img = 'img/noticias/';
            break;
        default:
            header('Location:admin.php');
            exit;
    }

    
    if ($delete_rel && $rel_query) {
        $stmtRel = $gbd->prepare($rel_query);
        $stmtRel->execute([$rel_param]);
    }

    
    $stmtDel = $gbd->prepare("DELETE FROM $tabla WHERE $campo_id = ? AND id_user = ?");
    $stmtDel->execute([$id, $id_user]);

    header('Location:admin.php');
    exit;
}

header('Location:admin.php');
exit;
?>
