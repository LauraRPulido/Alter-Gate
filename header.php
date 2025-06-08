<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter:Gate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Special+Elite&family=Syncopate:wght@400;700&family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Special+Elite&family=Syncopate:wght@400;700&family=Syne+Mono&family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/estilo.css">

</head>

<body>

    <header class="container-fluid" id="header">

        <div class="row d-flex justify-content-center d-lg-none m-4">

            <div class="col text-center">
                <a class="navbar-brand" href="./index.php">
                    <img class="" src="./img/logo altergate.png" alt="">
                </a>
            </div>
        </div>
        
        <div class="row d-flex d-lg-none align-items-center">

            <div class="col navMovil">
                <div class="container">
                    <div class="row d-flex align-items-center">

                        <nav class="col navbar">
            
                            <div class="container-fluid">
                
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                    
                                <span class=""><i class="bi bi-list"></i></span>
                                </button>

                                <div class="col-auto">
                                    <?php
                                    require_once('./functions.php');
                                    $isLogged = false;
                                    $imgUser = './img/iconDefault.png';
                                    $userHref = 'login.php';
                                    if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
                                        $isLogged = true;
                                        $userId = $_SESSION['id'] ?? $_COOKIE['id'];
                                        $imgUserName = obtenerImgUser($userId);
                                        if ($imgUserName) {
                                            $imgUser = './img/' . ltrim($imgUserName, './');
                                        }
                                        $userHref = 'admin.php';
                                    }
                                    ?>
                                    <a href="<?= $userHref ?>">
                                        <div class="rounded-circle">
                                           <img class="rounded-circle iconoLogin" src="<?= htmlspecialchars($imgUser) ?>" alt="Usuario">
                                        </div>
                                    </a>

                                </div>
                            
                                <div class="collapse navbar-collapse" id="navResponsive">
                                    <div class="navbar-nav navbar-movil py-2 px-1">
                
                                        <a href="./armario.php">Menú</a>
                                        <a href="./noticias.php">Noticias</a>
                                        <a href="./colecciones.php">Colecciones</a>
                                        <a href="./diseñadores.php">Diseñadores</a>
                
                                    </div> 
                    
                                </div>
                
                            </div>
                        
                        </nav>
                        
                        
                    </div>
                </div>
                
            </div>
    
        </div>

        <!-- Menú escritorio -->
        <div class="row d-none d-lg-grid align-items-center" style="display: grid; grid-template-columns: 1fr auto 1fr; justify-items: center; align-items: center;">
            <nav class="navbar navbar-expand-lg justify-content-start" style="grid-column: 1;">
                <div class="container-fluid m-0">
                    <div class="collapse navbar-collapse show" id="navResponsiveLeft">
                        <div class="navbar-nav navbar-escritorio py-2 px-1">
                            <a href="armario.php">Menú</a>
                            <a href="noticias.php">Noticias</a>
                            <a href="colecciones.php">Colecciones</a>
                            <a href="diseñadores.php">Diseñadores</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div style="grid-column: 2; justify-self: center;">
                <a class="navbar-brand" href="./index.php">
                    <img class="img-fluid logo-header" src="./img/logo altergate.png" alt="Logo AlterGate">
                </a>
            </div>
            <nav class="navbar navbar-expand-lg justify-content-end" style="grid-column: 3;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse show d-flex justify-content-end" id="navLogin">
                        <div class="navbar-nav navbar-escritorio py-2 px-1">
                            <?php
                            $isLogged = false;
                            if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
                                $isLogged = true;
                            }
                            $loginHref = $isLogged ? 'admin.php' : 'login.php';
                            ?>
                            <a href="<?= $loginHref ?>"><?= $isLogged ? 'Cuenta' : 'Login' ?></a>
                        </div>
                        <div class="navbar-nav navbar-escritorio py-2 ms-2 px-1">
                            <a href="registro.php">Registro</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Fin menú escritorio -->

    </header>
