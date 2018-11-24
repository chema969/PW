<?php
include "EmpresaConsultas.php";
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 23/11/18
 * Time: 13:03
 */
$consulta=new EmpresaConsultas();
$consulta->cambiarPrivilegios($_GET["usuario"],$_GET["privilegio"]);
header("Location:admin.php");
die();
?>