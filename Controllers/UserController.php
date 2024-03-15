<?php

include_once('db/db.php');
include_once ("models/productosDAO.php");

class UserController {

    public function showiniciosesion(){
        View::show("login");
    }

    public function cerrarsesion(){
        session_destroy();
        View::show("login");
    }

    public function validacioniniciosesion(){
        $errores = array();
    
        if (isset($_POST['iniciarsesion'])) {
            if (!isset($_POST['usuario']) || strlen($_POST['usuario']) == 0) {
                $errores['usuario'] = "El nombre debe estar relleno";
            }
            if (!isset($_POST['contrasena']) || strlen($_POST['contrasena']) == 0) {
                $errores['contrasena'] = "La contraseña no puede estar vacía";
            }
    
            if (empty($errores)) {
                include_once('models/usuariosDAO.php');
                $uDAO = new UsuariosDAO();
                $usuario = $uDAO->getUserByUsernameAndPassword($_POST['usuario'], $_POST['contrasena']);
                
                if (empty($usuario)) {
                    $errores['general'] = "El usuario no está registrado.";
                    View::show("login", ['errores' => $errores]);
                } else {
                    $_SESSION['usuario'] = $_POST['usuario'];
                    
                    // Redirección basada en el rol del usuario
                    if ($usuario['rol'] == 1) {
                        $comicsDAO = new ComicsDAO();
                        $comics = $comicsDAO->getAllComics();
                        $comicsDAO = null;
                        View::show("mostrarProductos", ['comics' => $comics]);
                    } elseif ($usuario['rol'] == 2) {
                        $comicsDAO = new ComicsDAO();
                        $comics = $comicsDAO->getAllComics();
                        $comicsDAO = null;
                        View::show("admin", ['comics' => $comics]);
                    }
                }
            } else {
                View::show("login", $errores);
                
            }
        }
    }
    
}
?>

