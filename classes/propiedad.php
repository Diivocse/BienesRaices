<?php

namespace App;

use Intervention\Image\Colors\Hsv\Channels\Value;

class Propiedad
{
    // Conexión a base de datos (protected static)
    protected static $db;
    protected static $columnasDB = ['titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Validación de errores, iniciamos variable
    protected static $errores = [];

    // Variables del objeto, estructura del objeto
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

    // Conectamos a la base de datos, vía "app.php"
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // Damos forma al objeto e inicializamos
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
        $this->vendedores_id = $args['vendedores_id'] ?? '1';
    }

    public function guardar()
    {

        // Sanitizar los atributos; llamos a la función para sanitizar los atributos
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        self::$db->query($query);

        return $resultado;
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

    // Validación de errores del formulario
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
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

        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }

    public function setImagen($imagen)
    {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function all()
    {
        $query = " SELECT * FROM propiedades ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultado
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;

            }
        }
        return $objeto;
    }
}
