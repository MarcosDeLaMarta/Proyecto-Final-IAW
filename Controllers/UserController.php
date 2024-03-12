<?php

include_once("views/view.php");

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
                    View::show("login", $errores);
                } else {
                    $_SESSION['usuario'] = $_POST['usuario'];
                    
                    // Redirección basada en el rol del usuario
                    if ($usuario['rol'] == 1) {
                        header("Location: index.php?action=showAllComics&controller=ComicsController");
                    } elseif ($usuario['rol'] == 2) {
                        // Redirige a la vista de administrador
                        header("Location: index.php?action=showAdminView&controller=AdminController");
                    }
                }
            } else {
                View::show("login", $errores);
            }
        }
    }
    
}
?>

