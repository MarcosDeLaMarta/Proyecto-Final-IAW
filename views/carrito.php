<?php
include_once("views/header.php");
?>

<div class="container mt-5">
    <h2 style="text-align: center"> Carrito de la compra </h2><br><br>
    <?php
      if(!empty($_SESSION['cart'])){
        echo " <table class='table'> <tr><th>Nombre</th> <th>Precio:</th><th>Descripcion</th><th>Procedencia</th></tr>";
        foreach ($data as $comic){
                      echo "<tr>
                      <td hidden>".$comic['comicId']."</td>
                      <td>".$comic['titulo']."</td>
                      <td>".$comic['precio']." € </td>
                      <td>".$comic['genero']."</td>"
        }
        echo "</table>";
      }else{
        echo "<div class='alert alert-danger'><p style='text-align: center;'>El carrito de la compra esta vacio</p></div>";
      }
      ?>
</div>

<?php
require_once("views/footer.php");
?>
