# Revisión de Código Limpio

| # | Archivo | Criterio | Problema | Mejora aplicada |
|---|---|---|---|---|
| 1 | `src/modelos/Categoria.php` | Nombres significativos | El constructor usaba `$n` y cerraba con `?>`. | Se renombró a `$nombre` y se quitó `?>`. |
| 2 | `src/modelos/Libro.php` | Fallar rápido (*fail-fast*) | `(float) $registro['precio']` convertía texto inválido a `0.0`. | Se validó con `is_numeric()` lanzando `InvalidArgumentException`. |
| 3 | `public/index.php` | Consistencia estructural | El `<nav>` tenía enlaces sueltos sin `<ul><li>`. | Se envolvió el menú en `<ul><li>` igual que en `libros.php` y `libro-detalle.php`. |
