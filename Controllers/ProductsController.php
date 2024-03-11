<?php

if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
  }
include_once ("views/view.php");
include_once ("models/productosDAO.php");

class ComicsController {
    public function showAllComics() {
        $comicsDAO = new ComicsDAO();
        $comics = $comicsDAO->getAllComics();
        $comicsDAO = null;
        View::show("mostrarProductos", ['comics' => $comics]);
    }

    public function addToCart(){
        if (isset($_GET['id_comic'])){
            array_push($_SESSION['cart'], $_GET['id_comic']);   
            $comicsDAO = new ComicsDAO();
            $comics = $comicsDAO->getAllComics();
            $comicsDAO = null;
            View::show("mostrarProductos", ['comics' => $comics]);
        }
    }

    public function verCarrito() {
        $comicsDAO = new ComicsDAO(); 
        $arrayCarrito = array();
    
        foreach ($_SESSION['carrito'] as $posicion => $id) {
            $comic = $comicsDAO->getComicById($id); 
            array_push($arrayCarrito, $comic);
        }
    
        View::show("carrito", ['comics' => $arrayCarrito]);

    }
    
    

    
}

    // http://localhost/index.php?action=showAllComics&controller=ComicsController
?>
