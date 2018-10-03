<?php include "EmpresaConsultas.php"?>
<?php
    $consultas=new EmpresaConsultas();
    $datosconsult=$consultas->getdata();?>
<head>
    <meta charset="utf-8">
    <title>Pagina principal</title>
</head>
 <h1 align="center">EMPLEADOS</h1>
 <table border="3" align="center" >
      <tr>
        <th>Nombre</th>
        <th>ID</th>
      </tr>

 <?php
 foreach ($datosconsult as $dato){
    echo '<tr><td><a href="datosEmpleados.php?id='.urlencode($dato["id"]).'"/>'.$dato["nombre"].'</td>'.'<td>'.$dato["id"].'</td></tr>';
    }
 echo'</table>';
echo'<form action="formulario.php">
    <input align="center" type="submit" value="Añadir usuario" />
</form>';

?>
