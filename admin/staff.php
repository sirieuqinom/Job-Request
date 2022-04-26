<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Job Request</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="admindashboard.php">Requests</a>
                <a class="nav-item nav-link active" href="#">Staff</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" style="pointer-events:none"> <?php echo $_SESSION["NAME"]; ?></a>
            </div>
        </div>
    </nav>
    <table class="table table-bordered table-hover table-responsive-xl">
        <thead>
            <tr>
                <th scope="col">DB ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * from users";
            $sqlQuery = mysqli_query($con, $sql);

            if ($sqlQuery) {
                $num = 0;
                while ($row = mysqli_fetch_assoc($sqlQuery)) {
                    $num++;

                    $name = $row['name'];
                    $email = $row['email'];
                    $role = $row['role'];

                    if ($role == "UITC staff") {

                        echo '
                        <tr data-href = "hello.html">
                          <th scope="row">' . $num . '</th>
                          <td>' . $name . '</td>
                          <td>' . $email . '</td>

                        ';
                    }
                }
            }

            ?>
        </tbody>
    </table>
</body>

</html>