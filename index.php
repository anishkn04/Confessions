<?php

$request  = $_SERVER['REQUEST_URI'];
$username = ltrim($request, "/");

// Check if $username is empty, null, or "index.php"
if ($username == null || $username == "" || str_contains($username, "index.php")) {
    header("Location: ./html/confessions.php");
    exit();
} else {
    // Ensure the username is safe for use in a URL
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    header("Location: /html/profile.php?username=$username");
    exit();
}