<?php
include_once ("views/header.php");
include_once ("Controllers/ProductsController.php");

//Punto de entrada a la aplicación. Si no se recibe parámetro action y controller en la url
//se muestra la página de inicio (texto HTML).
//En caso de que si se reciba, se instancia el controlador y se invoca la acción indicada.

if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    //Instanciación del controlador e invocación del método
    $controller=new $cont();
    $controller->$act();

}
else
    //Página de entrada
    $comicsController = new ComicsController();
    $comicsController->showAllComics();
    
    

  require_once ("views/footer.php");

?>
