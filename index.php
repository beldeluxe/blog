<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Foro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
    <body>
        <div>
            <form action="" method="post">
                <input type="text" name="user" placeholder="USUARIO"><br>
                <input type="password" name="pass" placeholder="CONTRASEÑA"><br>
                <input type="submit" name="login" value="ACEPTAR"><br>
                <p>Si aun no tienes cuenta <a href="">Registrate aquí</a></p>
            </form>
        </div>
    </body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Bels
 * Date: 11/04/2017
 * Time: 12:47
 * FORO2017
 */

if (isset($_REQUEST['login']))
{
    $user= $_REQUEST['user'];
    $pass= $_REQUEST['pass'];

    include('Conex.php');
    $con = new Conex(); 

    $consulta="select * from user where user='$user' AND password='$pass'";

    $resultado = $con->consultar("blog", $consulta);
   
    if(count($resultado)>0)
    {
        session_start();
        $_SESSION['usu'] = $resultado[0]["user"];

        echo  $_SESSION['usu'];


        $_SESSION['tipo'] = $resultado[0]["tipo"];

            if($_SESSION['tipo']==admin)
            {
                Header('Location:admin.php');
            }
            if($_SESSION['tipo']==user)
            {
                Header('Location:user.php');
            }

    }

    else
    {
        echo "identificación errónea";
    }    


}
