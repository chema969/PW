<?php include "EmpresaConsultas.php"?>

<head>
<meta charset="utf-8">
<title> Eliminar usuario</title>
</head>


<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 4/10/18
 * Time: 19:18
 */

echo'<body>
<h2>Elije usuaro a eliminar</h2>
<form>';

$consultas= new EmpresaConsultas();
$datosConsulta=$consultas->getdata();
foreach ($datosConsulta as $dato){
    echo '<input type="radio" name="id" value='.$dato["id"]. '>'.$dato["nombre"].' ' .$dato["apellidos"] . '<br>';
}

echo '<input type="submit" value="Borrar usuario">
</form>
</body>';
echo '<form action="main.php">
    <input align="center" type="submit" value="Volver atrás" />
</form>';
if($_GET["id"]!="") {
    $consultas->eraseUser($_GET["id"]);
    header("Location:main.php");
    die();
}
?>