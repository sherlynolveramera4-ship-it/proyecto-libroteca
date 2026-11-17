<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioLibros.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioLibros(__DIR__ . '/../datos/datos.json');
$libros = $repositorio->todos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libroteca - Libros</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Libros</h1>
        <nav aria-label="menu-principal">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="libros.php" aria-current="page">Catálogo</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Catálogo</h2>
            <a href="agregar-libro.php" class="boton-agregar">Agregar libro +</a>

            <?php if (empty($libros)): ?>
                <p>No hay libros registrados.</p>
            <?php else: ?>
                <div class="grid-libros">
                    <?php foreach ($libros as $libro): ?>
                        <?= renderizarTarjeta($libro) ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>© 2026 Libroteca. Todos los derechos reservados.</p>
    </footer>
</body>
</html>