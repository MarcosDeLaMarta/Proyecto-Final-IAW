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
    public function showAddProductForm() {
        View::show("addProducto");
    }
    public function addToCart(){
        if (isset($_GET['id'])){
            array_push($_SESSION['cart'], $_GET['id']);   
            $comicsDAO = new ComicsDAO();
            $comics = $comicsDAO->getAllComics();
            $comicsDAO = null;
            View::show("mostrarProductos", ['comics' => $comics]);
        }
    }
    public function verAdmin() {
        $comicsDAO = new ComicsDAO();
        $comics = $comicsDAO->getAllComics();
        $comicsDAO = null;
        View::show("admin", ['comics' => $comics]);

    }
    public function verCarrito() {
        $comicsDAO = new ComicsDAO(); 
        $arrayCarrito = array();
    
        foreach ($_SESSION['cart'] as $posicion => $id) {
            $comic = $comicsDAO->getComicById($id); 
            array_push($arrayCarrito, $comic);
        }
    
        View::show("carrito", ['comics' => $arrayCarrito]);

    }
    public function eliminarDelCarrito() {
        if (isset($_GET['id'])) {
            
            $idComic = $_GET['id'];
    
            // Busca la posición del cómic en el carrito
            $posicion = array_search($idComic, $_SESSION['cart']);
    
            if ($posicion !== false) {
                unset($_SESSION['cart'][$posicion]);
            }
        }
        $this->verCarrito();
    }
    public function verDetalleProducto() {
        if (isset($_GET['id'])) {
            $idProducto = $_GET['id'];
            $comicsDAO = new ComicsDAO();
            $comic = $comicsDAO->getComicById($idProducto);
            $comicsDAO = null;

            if ($comic) {
                View::show("detalles", ['comic' => $comic]);
            } 
        } 
    }
    public function addComic() {
        $errores = array();
        if (isset($_POST['addcomic'])) {
            if (!isset($_POST['titulo']) || strlen($_POST['titulo']) == 0) {
                $errores['titulo'] = "El título debe estar relleno";
            }
            if (!isset($_POST['autor']) || strlen($_POST['autor']) == 0) {
                $errores['autor'] = "El autor debe estar relleno";
            }
            if (!isset($_POST['precio']) || strlen($_POST['precio']) == 0) {
                $errores['precio'] = "El precio no puede estar vacío";
            } elseif (!is_numeric($_POST['precio'])) {
                $errores['precio'] = "El precio debe ser un número";
            }
            if (!isset($_POST['imagen']) || strlen($_POST['imagen']) == 0) {
                $errores['imagen'] = "La URL de la imagen no puede estar vacía";
            }
            if (!isset($_POST['genero']) || strlen($_POST['genero']) == 0) {
                $errores['genero'] = "El género no puede estar vacío";
            }
            if (!isset($_POST['descripcion']) || strlen($_POST['descripcion']) == 0) {
                $errores['descripcion'] = "La descripción no puede estar vacía";
            }
         
            if (empty($errores)) {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $genero = $_POST['genero'];
                $descripcion = $_POST['descripcion'];
    
                $comicsDAO = new ComicsDAO();
                $success = $comicsDAO->insertComic($titulo, $autor, $precio, $imagen, $genero, $descripcion);
                $comicsDAO = null;
    
                if ($success) {
                    $comicsDAO = new ComicsDAO();
                    $comics = $comicsDAO->getAllComics();
                    $comicsDAO = null;
                    View::show("admin", ['comics' => $comics]);
                } else {
                    echo "Error al agregar el cómic";
                }
            } else {
                View::show("addProducto", [$errores]);
            }
        }
    }
    
}


    // http://localhost/index.php?action=showAllComics&controller=ComicsController
?>
