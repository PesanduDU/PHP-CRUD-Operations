<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation Example</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container my-5 px-5">

        <?php

        if (isset($_GET['updateid'])) {
            $uid = $_GET['updateid'];

            require_once "./includes/retrievedata.php";
            $data = getUser($uid);

            foreach ($data as $row) {
                $dplyUName = $row['username'];
                $dplyUEmail = $row['email'];
                $dplyUMobile = $row['mobile'];
            }
        } else {
            $uid = 0;
        }

        ?>

        <form class="row g-3" action="./includes/update.inc.php?updateid=<?php echo $uid ?>" method="post">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Userame</label>
                <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo htmlspecialchars($dplyUName) ?>">
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo htmlspecialchars($dplyUEmail) ?>">
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" autocomplete="off" value="<?php echo htmlspecialchars($dplyUMobile) ?>">
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off">
            </div>

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Repeat Password</label>
                <input type="password" class="form-control" name="repassword" placeholder="Repeat your password" autocomplete="off">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success custom-btn-width" name="submit">Update</button>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-secondary custom-btn-width">
                    <a href="display.php" class="text-light text-decoration-none">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>
                </button>
            </div>
        </form>

    </div>

</body>

</html>