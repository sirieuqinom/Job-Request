<?php

include 'config.php';
session_start();

if (empty($_SESSION["EMAIL"])) {
    echo "
			    <script>
				    alert('SESSION ENDED. REDIRECTING TO LOGIN PAGE');
				    window.location = 'index.php';
			    </script>
			    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <a class="nav-item nav-link active" href="#">Dashboard</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" style="pointer-events:none"> <?php echo $_SESSION["EMAIL"]; ?></a>

            </div>
        </div>
    </nav>
    <table class="table table-bordered table-hover table-responsive-xl">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">REQUESTS</th>
                <th scope="col">DATES</th>
                <th scope="col">ACCOUNT TYPE</th>
                <th scope="col">PROVIDED EMAIL</th>
                <th scope="col">PROVIDED ID</th>
                <th scope="col">LOCAL NUMBER</th>
                <th scope="col">SOFTWARE</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">PROBLEM</th>
                <th scope="col">USER</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sessid = $_SESSION["ID"];

            $tasksql = "SELECT * FROM assigned_task where user_id = '$sessid' ";
            $taskquery = mysqli_query($con, $tasksql);

            if ($taskquery) {
                $i = 0;
                while ($rowss = mysqli_fetch_assoc($taskquery)) {
                    $reqrid = $rowss['request_id'];

                    $sqlreq = "SELECT * from requests where request ='$reqrid'";
                    $reqQuery = mysqli_query($con, $sqlreq);

                    if ($reqQuery) {

                        while ($row = mysqli_fetch_assoc($reqQuery)) {
                            $i++;
                            $reqid = $row['request'];

                            $sql = "SELECT * from request_type where request_id ='$reqid'";
                            $sqlQuery = mysqli_query($con, $sql);
                            if ($sqlQuery) {
                                while ($rows = mysqli_fetch_assoc($sqlQuery)) {
                                    $reqname = $rows['request'];
                                }
                            }
            ?>

                            <tr>
                                <th scope="row"><?php echo  $i; ?></th>
                                <td><?php echo $reqname; ?></td>
                                <td><?php echo $row['dates']; ?></td>
                                <td><?php echo $row['account_type']; ?></td>
                                <td><?php echo $row['provided_email']; ?></td>
                                <td><?php echo $row['provided_id']; ?></td>
                                <td><?php echo $row['local_number']; ?></td>
                                <td><?php echo $row['software']; ?></td>
                                <td><?php echo $row['dept']; ?></td>
                                <td><?php echo $row['problem']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 1) {
                                        $status = "Pending";
                                    }
                                    if ($row['status'] == 2) {
                                        $status = "Accepted";
                                    }
                                    if ($row['status'] == 3) {
                                        $status = "Ongoing";
                                    }
                                    if ($row['status'] == 4) {
                                        $status = "Finished";
                                    }
                                    ?>
                                    <?php echo $status; ?>
                                </td>

                                <td><a href="edit.php?nid=<?php echo $row['id']; ?>">Edit</a></td>
                            </tr>
            <?php
                        }
                    }
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>