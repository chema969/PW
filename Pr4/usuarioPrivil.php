<?php
include "EmpresaConsultas.php";
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 23/11/18
 * Time: 13:03
 */
session_start();
if($_SESSION["privilegios"]==2) {
    $consulta = new EmpresaConsultas();
    $consulta->cambiarPrivilegios($_GET["usuario"], $_GET["privilegio"]);
    header("Location:admin.php");
    die();
}
else{
    header("Location:index.php");
    die();
}
?>