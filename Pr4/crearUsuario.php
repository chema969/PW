<?php include "Usuario.php"?>
<?php include "EmpresaConsultas.php"?>
<head>
    <meta charset="utf-8">
    <title> Crear Usuario </title>
</head>

<body> <br><br>
<div align="center">
    <h1>Crear Usuario</h1>
    <form>
        Usuario:<br>
        <input name="usuario" type="text"    /><br>
        Contraseña:<br>
        <input name="pass" type="password"    /><br>
        Repetir contraseña:<br>
        <input name="pass2" type="password"    /><br>
        Nombre:<br>
        <input name="nombre" type="text"    /><br>
        Apellidos:<br>
        <input type="text" name="apellidos"  /> ><br>
        Correo:<br>
        <input type="email" name="correo" /><br>

        <input name="submit "type="submit" value="Introducir">

    </form>
    <form action="index.php">
        <input align="center" type="submit" value="Volver atrás" />
    </form>
</div>
</body>


<?php
/**
 * Created by PhpStorm.
 * User: i62cumuj
 * Date: 12/11/18
 * Time: 8:54
 */
if(isset($_GET['usuario'])and isset($_GET['pass']) and isset($_GET['pass2'])and $_GET['usuario']!="" and $_GET['pass']!=""){
    if($_GET['pass']!=$_GET['pass2']){
        echo "CONTRASEÑA ERRONEA";
    }
    else{
        $consult=new EmpresaConsultas();
        if(!$consult->existeNombre($_GET['nombre'])) {
            $user = new Usuario();
            $user->setUsuario($_GET['usuario']);
            $user->setPassword($_GET['pass']);
            $user->setApellidos($_GET['apellidos']);
            $user->setNombre($_GET['nombre']);
            $user->setCorreo($_GET['correo']);
            $user->setPrivilegios(0);
            if ($consult->addNombre($user)) {
                echo 'Usuario añadido';
            } else {
                echo 'Usuario No AÑADIDO';
            }

            header("Location:index.php");
            die();
        }
        else{
            echo "YA EXISTE UN USUARIO CON ESE MISMO NOMBRE";
        }
    }


}
