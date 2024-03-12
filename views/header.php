<?php
session_start();

if(!isset($_SESSION['cart'])){
  $_SESSION['cart']=array();
}
if(!isset($_SESSION['usuario'])){
  $_SESSION['usuario']=array();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Comics Cloud</title>
<link href="views/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php 
        if(!empty($_SESSION['usuario'])){
            echo '<header class="navbar navbar-expand-lg bg-secondary text-uppercase " id="mainNav">
                    <div class="container-fluid px-4">
                        <a class="navbar-brand ms-5" href="index.php"><img src="views/img/logo.png" class="img-fluid logo" alt="..."></a>
                        <p class="navbar-brand text-white m-lg-2 ms-5 nombretitulo">Comic Cloud</p>
                        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                
                                <li class="nav-item mt-2"><input class="form-control " type="search" placeholder="Buscar" aria-label="Search"></li>    
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#"><i class="bi bi-person-circle"></i> Perfil</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=showAllComics&controller=ComicsController"><i class="bi bi-list-nested"></i> Productos</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=verCarrito&controller=ComicsController"><i class="bi bi-bag"></i> Cesta</a></li>
                            </ul>
                        </div>
                    </div>
                </header>';
        }else {
            echo '<header class="navbar navbar-expand-lg bg-secondary text-uppercase " id="mainNav">
            <div class="container-fluid px-4">
                <a class="navbar-brand ms-5" href="index.php"><img src="views/img/logo.png" class="img-fluid logo" alt="..."></a>
                <p class="navbar-brand text-white m-lg-2 ms-5 nombretitulo">Comic Cloud</p>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                           
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-person-circle"></i> Iniciar sesión</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=showAllComics&controller=ComicsController"><i class="bi bi-list-nested"></i> Productos</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php?action=verCarrito&controller=ComicsController"><i class="bi bi-bag"></i> Cesta</a></li>
                    </ul>
                </div>
            </div>
            
        </header>';
        }
    ?>
