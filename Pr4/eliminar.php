<?php include "EmpresaConsultas.php";
include "session.php";
$admin=iniciarSesion();?>

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
?>
<body>
<h2>Elije usuaro a eliminar</h2>
<form>
<?php
$consultas= new EmpresaConsultas();
$datosConsulta=$consultas->getdata();
foreach ($datosConsulta as $dato){
    echo '<input type="radio" name="id" value='.$dato["id"]. '>'.$dato["nombre"].' ' .$dato["apellidos"] . '<br>';
}
?>
<input type="submit" value="Borrar usuario">
</form>
</body>
<form action="index.php">
    <input align="center" type="submit" value="Volver atrás" />
</form>
<?php
if(isset($_GET["id"])) {
    $consultas->eraseUser($_GET["id"]);
    header("Location:index.php");
    die();
}
?>