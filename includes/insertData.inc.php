<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {

        try {

            require_once "dbh.inc.php";

            $username = $_POST['username'];
            $useremail = $_POST['email'];
            $usermobile = $_POST['mobile'];
            $userpassword = $_POST['password'];
            $userrepeatpassword = $_POST['repassword'];

            if (empty($username) || empty($useremail) || empty($usermobile) || empty($userpassword) || empty($userrepeatpassword)) {
                header("Location: ../user.php?error=emptyinputfeilds");
                exit();
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../user.php?error=invalidusername");
                exit();
            } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../user.php?error=invalidemail");
                exit();
            } elseif (!preg_match("/^\+?[0-9]{10,15}$/", $usermobile)) {
                header("Location: ../user.php?error=invalidmobile");
                exit();
            } elseif ($userpassword !== $userrepeatpassword) {
                header("Location: ../user.php?error=passwordmismatch");
                exit();
            } else {
                require_once "dbh.inc.php";

                $query = "INSERT INTO users (username, email, mobile, pwd) VALUES (?, ?, ?, ?);";

                $stmt = $pdo->prepare($query);

                // $hshpwd = password_hash($userpassword, PASSWORD_DEFAULT);

                $stmt->execute([$username, $useremail, $usermobile, $userpassword]);

                $pdo = null;
                $stmt = null;

                header("Location: ../user.php?datainsert=success");
                exit();
            }
        } catch (PDOException $e) {
            die("Query Failed " . $e->getMessage());
            header("Location: ../user.php");
        }
    }
}
