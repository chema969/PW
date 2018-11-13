<?php include "EmpresaConsultas.php"?>
<?php
    $consultas=new EmpresaConsultas();
    $datosconsult=$consultas->getdata();?>
<head>
    <meta charset="utf-8">
    <title>Pagina principal</title>
</head>
 <p align="right"> <a href="crearUsuario.php">Crear Usuario</a>    <a href="crearUsuario.php">Entrar</a></p>
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
 echo '<div align="center">' ;
echo'<form action="formulario.php">
    <input align="center" type="submit" value="Añadir usuario" />
</form>';

echo '<form action="eliminar.php">
    <input align="center" type="submit" value="Eliminar usuario" />
</form>
</div>';

?>
