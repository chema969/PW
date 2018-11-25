<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 25/11/18
 * Time: 13:19
 */
include "EmpresaConsultas.php";
session_start();
if($_SESSION["privilegios"]==2) {
    $consulta = new EmpresaConsultas();
    $dato=$consulta->getPet($_GET["id"]);
    $consulta->nuevoSueldo($_GET["id"],$dato["nuevosueldo"]);
    $consulta->borrarPeticion($_GET["id"]);
    header("Location:peticiones.php");
    die();
}
else{
    header("Location:index.php");
    die();
}
?>