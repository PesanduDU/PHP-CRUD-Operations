<?php

require_once "dbh.inc.php";

echo "Delete success!";

echo '<br>';
echo '<br>';

if (isset($_GET['deleteid'])){
    
    $deleteid = $_GET['deleteid'];
    $query = "DELETE FROM `users` WHERE id=?;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$deleteid]);

    if ($stmt) {
        header("Location: ../display.php?userdel=success");
        exit();
    } else {
        header("Location: ../display.php?userdel=unsuccess");
        exit();
    }
    
}