<?php
declare(strict_types=1);

require_once __DIR__ . '/../modelos/Libro.php';

class RepositorioLibros {
    private string $ruta;

    public function __construct(string $ruta) {
        $this->ruta = $ruta;
    }

    private function leer(): array {
        if (!is_file($this->ruta)) {
            throw new RuntimeException('No se encontró el archivo de datos: ' . $this->ruta);
        }

        $registros = json_decode((string) file_get_contents($this->ruta), true);

        if (!is_array($registros)) {
            throw new RuntimeException('El archivo de datos no tiene un JSON válido: ' . $this->ruta);
        }

        return $registros;
    }

    private function convertir(array $registros): array {
        $libros = [];
        foreach ($registros as $registro) {
            $libros[] = Libro::desdeArreglo($registro);
        }
        return $libros;
    }

    public function todos(): array {
        return $this->convertir($this->leer());
    }

    public function buscar(int $id): Libro {
        foreach ($this->todos() as $libro) {
            if ($libro->obtenerId() === $id) {
                return $libro;
            }
        }
        throw new OutOfBoundsException('No existe un libro con el id ' . $id);
    }

    public function destacados(int $cantidad = 3): array {
        $disponibles = array_filter(
            $this->todos(),
            fn(Libro $libro): bool => $libro->estaDisponible()
        );
        return array_slice(array_values($disponibles), 0, $cantidad);
    }
}