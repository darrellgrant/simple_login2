<?php
$db_host = "";
$db_user = "";
$db_password = "";
$db_name = "";

try {$db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password); 
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOEXEPTION $e) {
    echo $e->getMessage();
}
