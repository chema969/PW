<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 24/11/18
 * Time: 14:26
 */
include "EmpresaConsultas.php";
include "session.php";
$admin=iniciarSesion();
$consulta=new EmpresaConsultas();
echo '<h1 align="center"> PETICIONES PENDIENTES</h1>';
echo '<table border="3" align="center" >
      <tr>
        <th>Usuario</th>
        <th>Peticion</th>
        <th>Accion</th>
      </tr>';
$datoc=$consulta->getPeticiones();
foreach ($datoc as $dato){
    $usuario=$consulta->getTrabajador($dato["id"]);
    if($dato["viejosueldo"]>$dato["nuevosueldo"]) {
        $xd=$dato["viejosueldo"]-$dato["nuevosueldo"];
        echo '<tr> <td>'.$dato["usuario"] .'</td>
          <td> Realizar una bajada de '.$xd.' al trabajador ' . $usuario["nombre"] . ' '.$usuario["apellidos"].'</td>'.
            '<td><a href="aceptarPeticion.php?id='.$dato["id"].'">Aceptar</a> <a href="borrarPeticion.php?id='.$dato["id"].'">Denegar</a></td></tr>';
    }
    else {
        $xd=$dato["nuevosueldo"]-$dato["viejosueldo"];

        echo '<tr> <td>'.$dato["usuario"] .'</td>
          <td> Realizar una subida de '.$xd.' al trabajador ' . $usuario["nombre"] . ' '.$usuario["apellidos"].'</td>'.
         '<td><a href="aceptarPeticion.php?id='.$dato["id"].'">Aceptar</a> <a href="borrarPeticion.php?id='.$dato["id"].'">Denegar</a></td></tr>';
    }

}

echo '</table><br><div align="center"><form action="index.php">
        <input align="center" type="submit" value="Volver atrás" />
    </form></div>';