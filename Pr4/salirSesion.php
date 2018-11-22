<?php
/**
 * Created by PhpStorm.
 * User: chema969
 * Date: 22/11/18
 * Time: 21:13
 */
session_start();
session_unset();

// destroy the session
session_destroy();
header("Location:index.php");
die();
?>