<?php

$request  = $_SERVER['REQUEST_URI'];
$username = ltrim($request, "/");

if($username==null || $username = ""){
    header("Location: ./html/confessions.php");
}else{
    header("Location: /html/profile.php?username=$username");
}
