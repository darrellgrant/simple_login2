<?php
//Quick Programming Simple Signup and login system

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Brainiac5";
$dbname = "databasename";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("Failed to connect");
}
