<?php

$dsn = "mysql:host=localhost;dbname=crudoperations";
$dbusername = "root";
$dbpassword = "Asusf15@123";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed " . $e->getMessage();
}