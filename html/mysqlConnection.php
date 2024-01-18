<?php

/*
For first time:
create database confessions;
create table users(
    username varchar(30) primary key,
    email varchar(30),
    password varchar(30)
);
create table confessions(
    confId int primary key,
    content text,
    username varchar(30),
    foreign key (username) references users(username)
);
*/

$dbhost = "localhost:0000";   //Use YOUR mysql server ports
$dbuser = "user"; //Use YOUR mysql username
$dbpassword = ""; //Use password for the specified user
$db = "confessions"; //Same name preferred!
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);
if(!$connection) die ("Connection Refused!");

?>