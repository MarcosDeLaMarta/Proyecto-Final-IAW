<?php include_once("views/header.php"); ?>

<!-- Contenido principal de la vista -->
<div class="container mt-5">

    <!-- Sección de cómics novedosos -->
    <div class="row p-5 d-flex justify-content-around bg-primary">
        <h1 class="nav-link text-white text-center bg-secondary rounded">Los más novedosos</h1>

        <?php foreach ($data['comics'] as $comic) : ?>
        <?php $enlaceid='<a href="index.php?action=addToCart&controller=ComicsController&id='.$comic['id_comic'].'" class="btn btn-success"> <i class="bi bi-cart-check"></i> Añadir a la cesta </a>'?>
            <div class="card col-xs-12 col-3 my-2" style="width: 18rem;">
                <a href="<?php echo 'views/img/'.$comic['imagen']; ?>">
                    <img src="<?php echo 'views/img/'.$comic['imagen']; ?>" class="card-img-top pt-2" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $comic['titulo']; ?></h5>
                    <p class="card-text">
                        <button type="button" class="btn btn-primary btn-sm">Superhéroes</button>
                        <button type="button" class="btn btn-primary btn-sm"><?php echo $comic['genero']; ?></button>
                    </p>
                    <p class="card-text text-red"><?php echo $comic['precio']; ?> € <span class="tachado"><?php echo $comic['precio']; ?> €</span></p>
                    <div class="d-grid gap-2">
                        <?php echo "$enlaceid"?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php require_once("views/footer.php"); ?>


