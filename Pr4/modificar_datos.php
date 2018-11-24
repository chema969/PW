<?php include "Empleado.php"?>
<?php include "EmpresaConsultas.php"?>
<?php
include "session.php";
$admin=iniciarSesion();
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 5/10/18
 * Time: 12:27
 */
$consultas= new EmpresaConsultas();
$datos=$consultas->getTrabajador($_GET["id"]);

echo '<form>
<input type="hidden" name="done" value="true" />
<input type="hidden" name="id" value="'.$_GET["id"].'" />
Nombre:<br>
        <input type="text" name="nombre" value="'.$datos["nombre"] .'"  ><br>
Apellidos:<br>
        <input type="text" name="apellidos" value="'.$datos["apellidos"] .'"   ><br>
DNI:<br>
        <input type="text" name="dni" value="'.$datos["dni"] .'" ><br>
Cargo:<br>
        <input type="text" name="cargo" value="'.$datos["cargo"] .'" ><br>
Correo:<br>
        <input type="email" name="correo" value="'.$datos["correo"] .'" ><br>
Peticion de modificación de sueldo:
        <input type="number" name="sueldo"
        min="900" max="3000" step="10" value="'.$datos["sueldo"].'"><br>
  <input type="submit" value="Introducir"><input type="reset">
  </form>';


if(isset($_GET['nombre'])){
    if($_GET['nombre']!="") {
        $empleado=new Empleado($_GET["nombre"],$_GET["apellidos"],$_GET["dni"]);
        $empleado->setId($_GET["id"]);
        $empleado->setCargo($_GET["cargo"]);
        $empleado->setCorreo($_GET["correo"]);
        if($_GET["sueldo"]!=$datos["sueldo"]) {
            $consultas->addPeticion($_GET["id"], $_GET["sueldo"],$datos["sueldo"], $_SESSION["username"]);
        }
        if ($consultas->updateUser($empleado)) {
            echo 'Usuario modificado';
      } else {
            echo 'Usuario No AÑADIDO';
        }
     if ($_GET["done"] == "true") {
            header("Location:index.php");
            die();
     }
}
}

?>