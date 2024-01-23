<?php

session_start();
$_SESSION['email'] = "";
session_reset();
session_destroy();

if(isset($_GET['ref'])){
    if($_GET['ref']=='profile'){
        header("Location: ./profile.php");
    }
    die();
}

header("Location: ./login.php");

?>