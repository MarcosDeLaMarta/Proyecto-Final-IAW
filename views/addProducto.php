<?php include_once("views/header.php"); ?>

<div class="container mt-5">
    <div class="text-center m-5">
        <h2>Añadir Nuevo Cómic</h2>
    </div>
    <form action="index.php?action=addComic&controller=ComicsController" method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">URL de la Imagen:</label>
            <input type="text" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Género:</label>
            <input type="text" class="form-control" id="genero" name="genero" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="text-center m-5">
        <button type="submit" name="addcomic" class="btn btn-primary">Añadir Cómic</button>
        <br>
        </div>
    </form>
</div>

<?php include_once("views/footer.php"); ?>
