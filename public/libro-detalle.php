<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioLibros.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioLibros(__DIR__ . '/../datos/datos.json');
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

try {
    $libro = $repositorio->buscar($id);
} catch (OutOfBoundsException $e) {
    $libro = null;
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libroteca - Detalle libro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Libroteca</h1>
        <nav aria-label="menu-principal">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="libros.php">Catálogo</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php if ($libro === null): ?>
            <section>
                <h2>Libro no encontrado</h2>
                <p>No existe un libro con ese identificador o ya no está disponible.</p>
                <a href="libros.php" class="boton-agregar">Volver al catálogo</a>
            </section>
        <?php else: ?>
            <nav class="migas" aria-label="Ruta de navegación">
                <ol>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="libros.php">Catálogo</a></li>
                    <li aria-current="page"><?= escapar($libro->obtenerNombre()) ?></li>
                </ol>
            </nav>

            <article class="tarjeta-libro">
                <img src="<?= escapar(rutaImagen($libro)) ?>" alt="Portada de <?= escapar($libro->obtenerNombre()) ?>">
                <h2><?= escapar($libro->obtenerNombre()) ?></h2>
                <p class="etiqueta-categoria"><?= escapar($libro->obtenerCategoria()->obtenerNombre()) ?></p>
                <p class="texto-secundario">Autor: <?= escapar($libro->obtenerAutor()) ?></p>
                <p class="tarjeta-libro-precio"><?= escapar($libro->obtenerPrecioFormateado()) ?></p>
                <p class="texto-secundario"><?= $libro->estaDisponible() ? 'Existencias: ' . $libro->obtenerStock() : 'Agotado' ?></p>
            </article>
        <?php endif; ?>
    </main>

    <footer>
        <p>© 2026 Libroteca. Todos los derechos reservados.</p>
    </footer>
</body>
</html>