<?php include "EmpresaConsultas.php"?>
<?php
include "session.php";
$admin=iniciarSesion();

    $consultas=new EmpresaConsultas();
    $datosconsult=$consultas->getdata();
echo '<head>
    <meta charset="utf-8">
    <title>Pagina principal</title>
</head>';

echo' <h1 align="center">EMPLEADOS</h1>
 <table border="3" align="center" >
      <tr>
        <th>Nombre</th>
        <th>ID</th>
      </tr>';
if($admin<1) {
    foreach ($datosconsult as $dato) {
        echo '<tr><td>' . $dato["nombre"] . '</td>' . '<td>' . $dato["id"] . '</td></tr>';
    }
}
else{
    foreach ($datosconsult as $dato) {
        echo '<tr><td><a href="datosEmpleados.php?id=' . urlencode($dato["id"]) . '"/>' . $dato["nombre"] . '</td>' . '<td>' . $dato["id"] . '</td></tr>';
    }
}
 echo'</table>';
 if($admin>0) {
     echo '<div align="center">';
     echo '<form action="formulario.php">
    <input align="center" type="submit" value="Añadir usuario" />
</form>';

     echo '<form action="eliminar.php">
    <input align="center" type="submit" value="Eliminar usuario" />
</form>
</div>';
 }
 if($admin==2){
     echo '<div align="center">';
     echo '<form action="admin.php">
    <input align="center" type="submit" value="Modificar propiedades de administración" />
</form>
<form action="peticiones.php">
    <input align="center" type="submit" value="Aceptar peticiones" />
</form></div>';
 }
?>
