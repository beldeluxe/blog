<?php

/**
 * Created by PhpStorm.
 * User: Bels
 * Date: 20/04/2017
 * Time: 11:21
 */

//include "Foro.php";

class Vista
{
    //recibe un array con las categorias de la base de datos y pinta select
    static function dibujaCategorias($categorias)
    {
        echo "<select name='select_categorias' id='select_categorias'>";

        foreach ($categorias as $clave)
        {
            foreach ($clave as $contenido)
            {
                echo "<option value='$contenido'>$contenido</option>";
            }

        }
        echo "</select>";
    }

    //recibe un array con los post de la base de datos (con filtro o sin él) y los pinta
    static function dibujarPost($array)
    {
        echo "<div id='post'>";
              foreach($array as $contenido)
              {
                    echo "<h3>".$contenido['titulo']."</h3>";
                    echo "<h4>".$contenido['autor']." ".$contenido['fecha']."</h4>";
                    echo "<p>".$contenido['contenido']."</p>";
              }
        echo "</div>";
    }
}