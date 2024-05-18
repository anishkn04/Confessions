<?php

$request  = $_SERVER['REQUEST_URI'];
$username = ltrim($request, "/");

if($username==null || $username == "" || !$username="index.php"){
    header("Location: ./html/confessions.php");
}else{
    header("Location: /html/profile.php?username=$username");
}
