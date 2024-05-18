<?php

$request  = $_SERVER['REQUEST_URI'];
$username = ltrim($request, "/");

if($username==null){
    header("Location: ./html/confessions.php");
}
header("Location: /html/profile.php?username=$username");

?>