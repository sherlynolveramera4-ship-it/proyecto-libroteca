# proyecto-libroteca

Catálogo de libros con consulta de detalles, filtrado y registro de nuevos títulos. Proyecto de la asignatura Aplicaciones Web (E-APW-2), grupo 401.

## Vista previa

https://github.com/2513119006-beep/proyecto-libroteca

## Dominio y entidades

| Entidad del curso | Equivalente en mi proyecto |
|---|---|
| Categoria | Género literario |
| Producto | Libro |
| Cliente / Usuario | Lector / Usuario |
| Pedido + DetallePedido | Reserva / Préstamo de libro |

## Estructura

    ```text
proyecto-libroteca/
├── datos/
│   └── datos.json              catálogo de 6 libros
├── docs/
│   └── checklist-ux.md         evaluación heurística de usabilidad
├── practica-3-1/              prácticas anteriores de HTML5
└── public/
    ├── assets/css/estilos.css  hoja de estilos del sitio
    ├── img/sin-portada.svg     imagen de portada por defecto
    ├── index.php               inicio
    ├── libros.php              listado de libros
    ├── libro-detalle.php       ficha de un libro (?id=)
    ├── agregar-libro.php       formulario para agregar un libro
    └── contacto.php            contacto

## Estado

Unidad II (front end) y Unidad III - S07 (vistas dinámicas en PHP leyendo `datos.json`) completas.

## Bitácora U3S07

1. **¿Qué aprendí?** Aprendí a separar los datos en un archivo JSON, modelarlos en clases de PHP con tipado estricto (`declare(strict_types=1)`), centralizar la lectura y búsqueda en `RepositorioLibros` y renderizar las vistas de forma segura con `htmlspecialchars()` y componentes reutilizables.
2. **¿Qué corregí?** Implementé manejo explícito de excepciones (`OutOfBoundsException` para devolver HTTP 404 en fichas inexistentes e `InvalidArgumentException` para validar campos obligatorios y precios numéricos en `Libro`) y eliminé duplicación mediante `renderizarTarjeta()`.
3. **¿Qué se me dificultó o falta por mejorar?** Comprender al principio la diferencia entre errores silenciosos por conversión de tipos en PHP y excepciones explícitas, así como configurar el servidor local en Codespaces. Como siguiente paso queda conectar `agregar-libro.php` y migrar la persistencia a base de datos en S08.

## Bitácora U2S06

1. {{¿Qué aprendí?: Aprendí a estructurar interfaces responsivas combinando Flexbox y CSS Grid, creando componentes dinámicos accesibles (migas de pan) y aplicando las 10 heurísticas de Nielsen para prevenir errores de UX.}}
2. {{¿Qué corregí?: Implementé validación visual para campos requeridos (.input-error), corregí la alineación de componentes mediante variables globales de CSS y estructuré el catálogo en cuadrícula.}}
3. {{¿Qué se me dificultó o falta por mejorar?: Ajustar la jerarquía visual de los componentes en pantallas pequeñas y sincronizar las variables personalizadas de CSS con la estructura requerida.}}