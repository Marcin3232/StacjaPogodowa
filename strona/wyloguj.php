<?php
session_start();
$_SESSION['zalogowany'] = false ;
$_SESSION = array();
session_destroy();
echo ("zostales wylogowany") ;
header("location: home_zalogowany.php");
?>