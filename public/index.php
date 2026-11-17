<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioLibros.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioLibros(__DIR__ . '/../datos/datos.json');
$destacados =$repositorio->destacados(3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libroteca</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Bienvenido a Libroteca</h1>
        <nav aria-label="menu-principal">
            <ul>
                <li><a href="index.php" aria-current="page">Inicio</a></li>
                <li><a href="libros.php">Catálogo</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Libros destacados</h2>
            <p>Encuentra los mejores libros en Libroteca.</p>

            <div class="grid-libros">
                <?php foreach ($destacados as$libro): ?>
                    <?= renderizarTarjeta($libro) ?>
                <?php endforeach; ?>
            </div>

            <a href="libros.php" class="boton-agregar">Ver todo el catálogo</a>
        </section>
    </main>

    <footer>
        <p>© 2026 Libroteca. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
