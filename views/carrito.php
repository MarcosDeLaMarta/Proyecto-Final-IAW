<?php
include_once("views/header.php");
?>

<!-- Contenido principal de la vista -->
<div class="container mt-5">
<h2>Tu Cesta</h2>

  <?php if (empty($_SESSION['cart'])) : ?>
      <p>No hay productos en tu cesta.</p>
  <?php else : ?>
      <table class="table">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($data['comics'] as $comic) : ?>
                  <tr>
                      <td><?php echo $comic['id_comic']; ?></td>
                      <td><?php echo $comic['titulo']; ?></td>
                      <td><?php echo $comic['precio']; ?> €</td>
                      <td>1</td> 
                      <td>
                          <a href="index.php?action=eliminarDelCarrito&controller=ComicsController&id=<?php echo $comic['id_comic']; ?>" class="btn btn-danger">Eliminar</a>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <br>
      <div class="text-center">
          <a href="index.php?action=showAllComics&controller=ComicsController" class="btn btn-primary">Continuar Comprando</a>
          <a href="#" class="btn btn-success">Realizar Pedido</a>
      </div>
  <?php endif; ?>
    <br>
    <br>
    <br>
</div>

<?php
require_once("views/footer.php");
?>
