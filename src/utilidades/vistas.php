<?php
declare(strict_types=1);

require_once __DIR__ . '/../modelos/Libro.php';

function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function rutaImagen(Libro $libro): string {
    $imagen = $libro->obtenerImagen();
    return $imagen !== '' ? $imagen : 'img/sin-portada.svg';
}

function renderizarTarjeta(Libro $libro): string {
    $id = $libro->obtenerId();
    $imagen = escapar(rutaImagen($libro));
    $nombre = escapar($libro->obtenerNombre());
    $categoria = escapar($libro->obtenerCategoria()->obtenerNombre());
    $autor = escapar($libro->obtenerAutor());
    $precio = escapar($libro->obtenerPrecioFormateado());
    $disponibilidad = $libro->estaDisponible() ? 'Disponible' : 'Agotado';

    return <<<HTML
<article class="tarjeta-libro">
    <img src="{$imagen}" alt="Portada de {$nombre}">
    <h3>{$nombre}</h3>
    <p class="etiqueta-categoria">{$categoria}</p>
    <p class="texto-secundario">Autor: {$autor}</p>
    <p class="tarjeta-libro-precio">{$precio}</p>
    <p class="texto-secundario">{$disponibilidad}</p>
    <a class="enlace-detalle" href="libro-detalle.php?id={$id}">Ver detalle</a>
</article>
HTML;
}