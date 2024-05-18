<?php

$request = $_SERVER['REQUEST_URI'];
$username = ltrim($request, "/");

header("Location: /profile.php?username=$username");