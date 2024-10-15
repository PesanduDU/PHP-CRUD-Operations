<?php

require_once "dbh.inc.php";

function getAllUsers() {

    global $pdo; // Use the PDO instance from the included file
    $query = "SELECT * FROM users;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Use the PDO instance from the included file
}

function getUser(INT $id) {

    global $pdo;
    $query = "SELECT * FROM users WHERE id=?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}