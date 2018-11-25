<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 25/11/18
 * Time: 13:54
 */

include "EmpresaConsultas.php";
session_start();
if($_SESSION["privilegios"]==2) {
    $consulta = new EmpresaConsultas();
    $consulta->borrarPeticion($_GET["id"]);
    header("Location:peticiones.php");
    die();
}
else{
    header("Location:index.php");
    die();
}
?>