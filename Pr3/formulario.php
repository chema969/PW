<?php include "Empleado.php"?>
<?php include "EmpresaConsultas.php"?>
<head>
    <meta charset="utf-8">
<title> Crear Usuario </title>
</head>

<body> <br><br>
<div align="center">
    <h1>Crear Usuario</h1>
    <form>
        Nombre:<br>
        <input type="text" name="nombre"   ><br>
        Apellidos:<br>
        <input type="text" name="apellidos"   ><br>
        DNI:<br>
        <input type="text" name="dni" ><br>
        Cargo:<br>
        <input type="text" name="cargo" ><br>
        Correo:<br>
        <input type="email" name="correo" ><br>

        <input name="submit "type="submit" value="Introducir">

       </form>
   <form action="main.php">
        <input align="center" type="submit" value="Volver atrás" />
    </form>
</div>
</body>

<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 3/10/18
 * Time: 22:29
 */


    if($_GET['nombre']!=""){
        $empleado=new Empleado($_GET['nombre'],$_GET['apellidos'],$_GET['dni']);
        $consultas = new EmpresaConsultas();
        $empleado->setId($consultas->getMaxId() + 1);
        $empleado->setCargo($_GET["cargo"]);
        $empleado->setCorreo($_GET["correo"]);
        if ($consultas->addUser($empleado)) {
            echo 'Usuario añadido';
        } else {
            echo 'Usuario No AÑADIDO';
        }
        header("Location:main.php");
        die();
    }

?>
