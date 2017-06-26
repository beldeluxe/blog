   <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
      

<?php

/**
 * Created by PhpStorm.
 * User: Bels
 * Date: 17/04/2017
 * Time: 20:12
 */

session_start();

include "Foro.php";
include "Vista.php";

if(!isset($_SESSION['usu']))
{
    echo "<h2>no tienes permisos de acceso</h2>";
}    

else
{        

    echo "<h3>Hola ".$_SESSION['usu']." </h3>";
    echo "<form action='' method='post' id='salir'>
            <input type='submit' name='salir' value='Cerrar Sesión' >
            </form>
             <div id='contenedor'>";

    $array= Foro::getPost();
    echo '<br>';
    if(!isset($_REQUEST['filtrar']))
    {
        vista::dibujarPost($array);
    }

    echo "<div id='filtro'>
            <form action='' method='post'>
        <p>indica categoria para filtar</p>";
      

    $categorias= Foro::getCategorias();
    echo Vista::dibujaCategorias($categorias);



    echo "<input type='submit' name='filtrar' value='filtrar'>
            </form>
            </div>        
            <div id=formulario>
                <form action='' method='post'>

                    <h3>Insertar nuevo post</h3>
                    Titulo:  <input type='text' name='titulo'><br>
                    Autor:  <input type='text' name='autor'><br>
                    Fecha:  <input type='date' name='fecha'><br>
                    Categoria:  <input type='text' name='categoria'><br>
                    Contenido: <textarea name='contenido' id='' cols='30' rows='10'></textarea><br>
                    <input type='submit' name='guardar' value='guardar'>
                </form>
            </div>
            </div>";
     

    if (isset($_REQUEST['guardar']))
    {
        $titulo= $_REQUEST['titulo'];
        $autor= $_REQUEST['autor'];
        $fecha= $_REQUEST['fecha'];
        $categoria= $_REQUEST['categoria'];
        $contenido= $_REQUEST['contenido'];

        $resul= Foro::insertPost($titulo, $autor, $fecha, $categoria, $contenido);

            if($resul==true)
            {
                echo "post insertado con exito";
            }
            else
            {
                echo "no se pudo guardar el post";
            }
    }

    if(isset($_REQUEST['filtrar']))
    {
        $filtro = $_REQUEST['select_categorias'];

        $array = Foro::getPost($filtro);

        echo "<div id='colocar'>
        <h3>Resultado de la búsqueda</h3>";
        Vista::dibujarPost($array);
        echo "</div>";
    }

     if(isset($_REQUEST['salir']))
    {
       session_unset();
       Header('Location:index.php');
    }
}  
    echo "</body>
        </html>";