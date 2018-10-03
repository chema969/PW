<?php include "EmpresaConsultas.php"?>
<?php
    $consultas=new EmpresaConsultas();
    $datosconsult=$consultas->getdata();?>
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
 echo'</table>'


?>
