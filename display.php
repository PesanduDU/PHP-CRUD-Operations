<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>

    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-primary mt-5 mb-3"><a href="user.php" class="text-light text-decoration-none">Add User</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

                <?php

                require_once "./includes/retrievedata.php";
                $data = getAllUsers();

                foreach ($data as $row):
                    $uid = $row['id'];
                    $uname = $row['username'];
                    $uemail = $row['email'];
                    $umobile = $row['mobile'];
                    $upass = $row['pwd'];

                ?>

                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($uid); ?></th>
                        <td><?php echo htmlspecialchars($uname); ?></td>
                        <td><?php echo htmlspecialchars($uemail); ?></td>
                        <td><?php echo htmlspecialchars($umobile); ?></td>
                        <td><?php echo htmlspecialchars($upass); ?></td>
                        <td>
                            <button type="button" class="btn btn-success">
                                <a href="./includes/update.inc.php" class="text-light text-decoration-none">Update</a>
                            </button>
                            <button type="button" class="btn btn-danger" name="delete">
                                <a href="./includes/delete.inc.php?deleteid=<?php echo $uid; ?>"class="text-light text-decoration-none">Delete</a>
                            </button>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>