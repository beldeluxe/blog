<?php

/**
 * Created by PhpStorm.
 * User: Bels
 * Date: 18/04/2017
 * Time: 18:21
 */

include "Conex.php";

class Foro
{
    //obtiene los posts existentes en la base de datos, con filtro o no
    //devuelve un array con el contenido
    static function getPost($filtro=null)
    {
        if (func_num_args() == 1)
        {
            $query="SELECT * from post where categoria='$filtro'";
            $conexion = new Conex();
            $res = $conexion->consultar("blog", $query);
        }
        else
        {
            $query="SELECT * from post";

            $conexion = new Conex();
            $res = $conexion->consultar("blog", $query);
        }

        return $res;
    }

    //inserta post en la base de datos
    static function insertPost($titulo, $autor, $fecha, $categoria, $contenido)
    {
        $query= "INSERT INTO post (id, titulo, autor, fecha, categoria, contenido)
        VALUES (NULL, '$titulo', '$autor', '$fecha', '$categoria', '$contenido')";

        $conexion = new Conex();
        $res = $conexion->consultar("blog", $query);

        return $res;

    }

    //obtiene las existentes en la base de datos
    //devuelve un array con el contenido
    static function getCategorias()
    {
        $query="SELECT DISTINCT categoria from post";
        $conexion = new Conex();
        $res = $conexion->consultar("blog", $query);

        return $res;
    }
}