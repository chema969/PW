<?php include "EmpresaConsultas.php"?>
<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 3/10/18
 * Time: 19:56
 */
  $datos= new EmpresaConsultas();
  $dato=$datos->getTrabajador($_GET["id"]);

    echo '<head> 
     <meta charset="utf-8">
     <title>'.
    $dato["nombre"] . '  ' . $dato["apellidos"] . '</title>';

echo '<body>';

    echo '<h1>' . $dato["nombre"] .' '.$dato["apellidos"]. '</h1>';
    echo '<ul>
    <li><strong>Nombre:</strong>' . $dato["nombre"] . '</li>
    <li><strong>Apellidos:</strong>' . $dato["apellidos"] . '</li>
    <li><strong>ID:</strong>' . $dato["id"] . '</li>
    <li><strong>DNI:</strong>' . $dato["dni"] . '</li>
</ul>';

echo '<form action="index.php">
    <input type="submit" value="Volver al listado" />
</form>
</body>'
?>
