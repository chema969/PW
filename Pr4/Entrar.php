
/**
 * Created by PhpStorm.
 * User: i62cumuj
 * Date: 20/11/18
 * Time: 16:32
 */
Usuario:<br>
        <input name="usuario" type="text"    /><br>
Contraseña:<br>
        <input name="pass" type="password"    /><br>
<input name="submit "type="submit" value="Introducir">

<?php
if(isset($_GET['usuario'])and isset($_GET['pass'])) {
    if ($_GET['usuario'] != ""and $_GET['pass']!="") {
        $empleado = new Empleado($_GET['nombre'], $_GET['apellidos'], $_GET['dni']);
        $consultas = new EmpresaConsultas();
        $empleado->setId($consultas->getMaxId() + 1);
        $empleado->setCargo($_GET["cargo"]);
        $empleado->setCorreo($_GET["correo"]);
        if ($consultas->addUser($empleado)) {
            echo 'Usuario añadido';
        } else {
            echo 'Usuario No AÑADIDO';
        }

        header("Location:index.php");
        die();

    }
}
?>