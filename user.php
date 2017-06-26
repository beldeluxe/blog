<?php

session_start();

include "Foro.php";
include "Vista.php";

echo "Hola ".$_SESSION['usu'];
/**
 * Created by PhpStorm.
 * User: Bels
 * Date: 17/04/2017
 * Time: 20:12
 */
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php

echo "<form action='' method='post'>
    <p>indica categoria</p>";

$categorias= Foro::getCategorias();

/*echo "<select name='select_categorias' id='select_categorias'>";

foreach ($categorias as $clave)
{
    foreach ($clave as $contenido)
    {
        echo "<option value='$contenido'>$contenido</option>";
    }

}
echo "</select>*/

    echo Vista::dibujaCategorias($categorias);
    echo "<input type='submit' name='filtrar' value='filtrar'>
</form>

</body>
</html>";



if(isset($_REQUEST['filtrar']))
{
    $filtro=$_REQUEST['select_categorias'];

    $array= Foro::getPost($filtro);


    Vista::dibujarPost($array);
}