<?php include "EmpresaConsultas.php"?>
<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 3/10/18
 * Time: 19:56
 */
  include "session.php";
  $admin=iniciarSesion();
  $datos= new EmpresaConsultas();
  $dato=$datos->getTrabajador($_GET["id"]);

    echo '<head> 
     <meta charset="utf-8">
     <title>'.
    $dato["nombre"] .'  '. $dato["apellidos"].'</title>';

echo '<body>';
    echo '<h1>' . $dato["nombre"] .' '.$dato["apellidos"]. '</h1>';
    echo '<ul>
    <li><strong>Nombre:</strong>' . $dato["nombre"] . '</li>
    <li><strong>Apellidos:</strong>' . $dato["apellidos"] . '</li>
    <li><strong>ID:</strong>' . $dato["id"] . '</li>
    <li><strong>DNI:</strong>' . $dato["dni"] . '</li>
    <li><strong>Cargo:</strong>' . $dato["cargo"] . '</li>
    <li><strong>Correo:</strong>' . $dato["correo"] . '</li>
    <li><strong>Sueldo:</strong>' . $dato["sueldo"] . '</li>
</ul>';
    if($admin>0) {
        echo '<form action="modificar_datos.php">
    <input type="hidden" name="id" value="' . $dato["id"] . '" />
    <input type="submit" value="Modificar datos" />
</form><br>';
    }
echo '<form action="index.php">
    <input type="submit" value="Volver al listado" />
</form>
</body>';
?>