<?php
/**
 * Clase Conex.php conecta con la bd
 */


class Conex
{

    private $host;
    private $usuario;
    private $password;

    /**
     * Conex constructor.
     */
    public function __construct()
    {
        $this->usuario ="root";
        $this->password ="";
        $this->host ="localhost";
    }

    public function consultar($base_datos, $consulta){

        $db = new mysqli($this->host, $this->usuario, $this->password, $base_datos);

        $resultado = $db->query($consulta);
        if(is_bool($resultado)){
            return $resultado;
        }else{
            $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);

        }

        return $respuesta;

    }

}