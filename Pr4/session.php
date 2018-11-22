<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 22/11/18
 * Time: 22:00
 */
function iniciarSesion(){
    session_start();

    if(isset($_SESSION['username'])){
        $logged = true;
        $username = $_SESSION['username'];
        $admin = $_SESSION['privilegios'];
    }
    else{
        $logged = false;
    }

    if($logged==false){
        echo '<p align="right"> <a href="crearUsuario.php">Crear Usuario</a>    <a href="Entrar.php">Entrar</a></p>';return -1;}
    else{
        if($_SESSION["expire"]<time()){  session_unset();

// destroy the session
            session_destroy(); return -1; }
        else {
            echo '<p align="right">Hola,<a href="datosSesion.php">' . $username . '</a>. <a href="salirSesion.php">Salir de sesión</a>';
        }
        }

    return $admin;
}