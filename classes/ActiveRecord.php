<?php

namespace App;

use App\Propiedad;
use App\Vendedor;

class ActiveRecord
{
    // Conexión a base de datos (protected static)
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Validación de errores, iniciamos variable
    protected static $errores = [];

    // Variables del objeto, estructura del objeto
    public $id;
    public $imagen;
    /*  public $titulo;
    public $precio;
    
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;
    public $nombre;
    public $apellido;
    public $telefono; */

    // Conectamos a la base de datos, vía "app.php"
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // ————————————————————————————————————————————————————————————————————
    // —— MODULO PARA actualizar.php ACTUALIZA LA BASE DE DATOS
    // ————————————————————————————————————————————————————————————————————
    public function guardar()
    {
        if (!is_null($this->id)) {
            // ACTUALIZAMOS EL REGISTRO CON LA FUNCIÓN actualizar()
            $this->actualizar();
        } else {
            // DADO EL CASO, CREAMOS UN NUEVO REGISTRO CON crear()
            $this->crear();
        }
    }

    // ————————————————————————————————————————————————————————————————————
    // —— MODULO PARA crear.php INSERTA Y SANITIZA LOS REGISTROS EN LA BASE DE DATOS
    // ————————————————————————————————————————————————————————————————————
    public function crear()
    {

        // Sanitizar los atributos; llamos a la función para sanitizar los atributos
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "') ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }

        return $resultado;
    }


    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {

            // Redireccionar al usuario
            header('location: /admin?resultado=2');
        }
    }

    public function eliminar()
    {
        $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    public function atributos()
    {
        $atributos = [];

        foreach (static::$columnasDB as $columna) {
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

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // Validación de errores del formulario
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    public function setImagen($imagen)
    {
        // Eliminar la imagen previa (MODULO DE ACTUALIZAR.PHP)
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        // Asignación de la variable imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function all()
    {
        $query = " SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function get($cantidad)
    {
        $query = " SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id =" . "{$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultado
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
