<?php
//Brad Traversy PHP and PDO Crash Course

$host = "localhost";
$user = "root";
$password = "Brainiac5";
$dbname = "";

//set DSN
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;

//create a PDO instance

$pdo = new PDO($dsn, $user, $password);