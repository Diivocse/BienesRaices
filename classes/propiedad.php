<?php

namespace App;

class Propiedad
{
    // Conexión a base de datos (protected y static)
    protected static $db;
    protected static $columnasDB = ['titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Validación de errores
    protected static $errores = [];

    // Variables del objeto
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y-m-d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }


    public function guardar()
    {

        // Sanitizar los atributos; llamos a la función para sanitizar los atributos
        $atributos = $this->sanitizarAtributos();
        $string = join(', ', array_keys($atributos));
        join(', ', array_values($atributos));

        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        self::$db->query($query);
    }

    public function atributos()
    {
        $atributos = [];

        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Validación
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validacion()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes seleccionar un precio";
        }

        if (strlen($this->descripcion) < 5) {
            self::$errores[] = "Debes agregar una descripción mayor a 10 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "Debes seleccionar el número de habitaciones";
        }

        if (!$this->wc) {
            self::$errores[] = "Debes seleccionar el número de baños";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "Debes agregar el número de estacionamiento";
        }

        if (!$this->vendedores_id) {
            self::$errores[] = "Debes seleccionar el vendedor";
        }

        if (!$this->imagen['name']) {
            self::$errores[] = "La imagen es obligatoria";
        }

        /*         // Asignar files a una variable
        $imagen = $_FILES['imagen'];

        // Validar el tamaño de imagen (1mb)
        $medida = 1000 * 1000;

        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        } */

        return self::$errores;
    }
}
