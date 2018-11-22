<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 22/11/18
 * Time: 21:03
 */
session_start();

echo '<head> 
     <meta charset="utf-8">
     <title>'.
    $_SESSION['username'].'</title>';

echo '<body>';
echo '<h1>' . $_SESSION['username']. '</h1>';
echo '<ul>
    <li><strong>Nombre:</strong>' . $_SESSION['name'] . '</li>
    <li><strong>Apellidos:</strong>' .$_SESSION["apellidos"] . '</li>
    <li><strong>Correo:</strong>' .$_SESSION["correo"]. '</li>
</ul>';
echo '<form action="index.php">
    <input type="submit" value="Volver al listado" />
</form>
</body>';
?>