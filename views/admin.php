<?php include_once("views/header.php"); ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Listado de Productos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['comics'] as $comic) : ?>
                <tr>
                    <td><?php echo $comic['id_comic']; ?></td>
                    <td><?php echo $comic['titulo']; ?></td>
                    <td><?php echo $comic['autor']; ?></td>
                    <td><?php echo $comic['descripcion']; ?></td>
                    <td><?php echo $comic['precio']; ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center mb-5">
        <a href="index.php?action=showAddProductForm&controller=ComicsController" class="btn btn-primary">Añadir Producto</a>
    </div>
</div>

<?php include_once("views/footer.php"); ?>
