<?php include "EmpresaConsultas.php"

    /**
 * Created by PhpStorm.
 * User: i62cumuj
 * Date: 20/11/18
 * Time: 16:32
 */?>
    <form>

Usuario:<br>
        <input name="usuario" type="text"    /><br>
Contraseña:<br>
        <input name="pass" type="password"    /><br>
<input name="submit "type="submit" value="Introducir">
        </form>

<?php
if(isset($_GET['usuario'])and isset($_GET['pass'])) {
    if ($_GET['usuario'] != ""and $_GET['pass']!="") {
        $consultas = new EmpresaConsultas();

        if ($consultas->iniciarSesion($_GET["usuario"],$_GET["pass"])!=0) {
            session_start();
            $userSessionInfo = $consultas->getNombre($_GET["usuario"]);
            $_SESSION['username'] = $userSessionInfo['usuario'];
            $_SESSION['name'] = $userSessionInfo['nombre'];
            $_SESSION["correo"]= $userSessionInfo["correo"];
            $_SESSION["apellidos"]= $userSessionInfo["apellidos"];
            $_SESSION['privilegios'] = $userSessionInfo['privilegios'];
            $_SESSION["expire"]= time()+3600;
            header("Location:index.php");
            die();
        } else {
            echo 'PASSWORD INCORRECTA';
        }



    }
}
?>