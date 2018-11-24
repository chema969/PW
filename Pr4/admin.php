<?php include "Usuario.php"?>
<?php include "EmpresaConsultas.php";
include "session.php";
$admin=iniciarSesion();
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 22/11/18
 * Time: 23:36
 */
if($admin!=2){
    header("Location:index.php");
    die();
}

$consultas=new EmpresaConsultas();
$datosconsult=$consultas->getdataUsuarios();
echo' <h1 align="center">USUARIOS</h1><br><br><h3 align="center">USUARIOS MUNDANOS</h3>
 <table border="3" align="center" >
      <tr>
        <th>Nombre de usuario</th>
        <th>Privilegios</th>
      </tr>';
    $a=0;
    foreach ($datosconsult as $dato) {
        if($a<$dato["privilegios"]and $dato["privilegios"]==1){
            echo '</table><br><br><h3 align="center">USUARIOS PRIVILEGIADOS</h3><table border="3" align="center" ><tr>
        <th>Nombre de usuario</th>
        <th>Privilegios</th>
        </tr>';$a=$dato["privilegios"];
        }

        if($a<$dato["privilegios"]and $dato["privilegios"]==2){
            echo '</table><br><br><h3 align="center">ADMINISTRADORES</h3><div align="center">
            <ul>';
            $a=$dato["privilegios"];
        }
        if($dato["privilegios"]==0)
            echo '<tr><td>' . $dato["usuario"] . '</td>' . '<td><a href="usuarioPrivil.php?usuario='. urlencode($dato["usuario"]).'&privilegio=1">Cambiar a usuario privilegiado</a></td></tr>';
        if($dato["privilegios"]==1)
            echo '<tr><td>' . $dato["usuario"] . '</td>' . '<td><a href="usuarioPrivil.php?usuario='. urlencode($dato["usuario"]).'&privilegio=0">Cambiar a usuario no privilegiado</a></td></tr>';
        if($dato["privilegios"]==2)
            echo '<li><strong>Usuario:</strong>' . $dato["usuario"] . '</li>';
    }
echo'</ul>';
echo '<form action="index.php">
        <input align="center" type="submit" value="Volver atrás" />
    </form></div>'
?>