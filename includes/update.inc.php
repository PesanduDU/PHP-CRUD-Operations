<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {

        try {

            require_once "dbh.inc.php";

            // $userid = 0;

            if (isset($_GET['updateid'])){
                $userid  = $_GET['updateid'];
            } else {
                $userid = 0;
            }

            $updateusername = $_POST['username'];
            $updateuseremail = $_POST['email'];
            $updateusermobile = $_POST['mobile'];
            $updateuserpassword = $_POST['password'];
            $updateuserrepeatpassword = $_POST['repassword'];

            if (empty($updateusername) || empty($updateuseremail) || empty($updateusermobile) || empty($updateuserpassword) || empty($updateuserrepeatpassword)) {
                header('Location: ../update.php?updateid='.$userid.'&error=emptyinputfeilds');
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9_@#$.]*$/", $updateusername)) {
                header('Location: ../update.php?updateid='.$userid.'&error=invalidusername');
                exit();
            } elseif (!filter_var($updateuseremail, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../update.php?updateid='.$userid.'&error=invalidemail');
                exit();
            } elseif (!preg_match("/^\+?[0-9]{10,15}$/", $updateusermobile)) {
                header('Location: ../update.php?updateid='.$userid.'&error=invalidmobile');
                exit();
            } elseif ($updateuserpassword !== $updateuserrepeatpassword) {
                header('Location: ../update.php?updateid='.$userid.'&error=passwordmismatch');
                exit();
            } else {
                require_once "dbh.inc.php";

                echo '<h1>success</h1>';

                $query = "UPDATE `users` SET username=?, email=?, mobile=?, pwd=? WHERE id=?;";
                $stmt = $pdo->prepare($query);

                // // $hshpwd = password_hash($userpassword, PASSWORD_DEFAULT);

                $stmt->execute([$updateusername, $updateuseremail, $updateusermobile, $updateuserpassword, $userid]);

                $pdo = null;
                $stmt = null;

                header("Location: ../display.php");
                exit();
            }
        } catch (PDOException $e) {
            die("Query Failed " . $e->getMessage());
            header("Location: ../display.php");
        }
    } else {
        header("Location: ../display.php");
        exit();
    }
}
