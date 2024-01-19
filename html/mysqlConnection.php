<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "confessions";
$connection = new mysqli($servername, $uname, $pass);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($connection->query($sqlCreateDatabase) === FALSE) {
    die("Error creating database: " . $connection->error);
} 


$connection->select_db($dbname);




$sqlCreateUsersTable = "CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(30) PRIMARY KEY,
    email VARCHAR(30),
    pass VARCHAR(30)
)";

if ($connection->query($sqlCreateUsersTable) === FALSE) {
    die("Error creating table 'users': " . $connection->error);
} 


$sqlCreateConfessionsTable = "CREATE TABLE IF NOT EXISTS confessions (
    confId INT PRIMARY KEY,
    content TEXT,
    username VARCHAR(30),
    FOREIGN KEY (username) REFERENCES users(username)
)";


if ($connection->query($sqlCreateConfessionsTable) === FALSE) {
    die("Error creating table 'confessions': " . $connection->error);
} 




