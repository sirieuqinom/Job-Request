<?php

include 'config.php';
session_start();

if (empty($_SESSION["EMAIL"])) {
    echo "
			    <script>
				    alert('NO LOGIN DETECTED. REDIRECTING TO LOGIN PAGE');
				    window.location = 'index.php';
			    </script>
			    ";
}
?>
<style>
    .disable_cancel {
        pointer-events: none;
        color: gray;
    }

    .enable_cancel {
        color: green;
    }
</style>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        tr[data-href] {
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(document.body).on("click", "tr[data-href]", function() {
                window.location.href = this.dataset.href;
            });
        });
    </script>
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
                <a class="nav-item nav-link" href="request.php">Submit request</a>
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
                <th scope="col">STATUS</th>
                <th scope="col">ACCEPTED BY</th>
                <th scope="col">DATE SUBMITTED</th>
                <th scope="col">DATE MODIFIED</th>
                <th scope="col">ACTION</th>
                <th scope="col">VIEW</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sess = $_SESSION["EMAIL"];

            $sql = "SELECT * from requests where email ='$sess'";
            $sqlQuery = mysqli_query($con, $sql);

            if ($sqlQuery) {
                $num = 0;
                while ($row = mysqli_fetch_assoc($sqlQuery)) {
                    $num++;
                    $reqid = $row['request'];

                    $sqlreq = "SELECT * from request_type where request_id ='$reqid'";
                    $sqlreqQuery = mysqli_query($con, $sqlreq);
                    if ($sqlreqQuery) {
                        while ($rows = mysqli_fetch_assoc($sqlreqQuery)) {
                            $request = $rows['request'];
                        }
                    }
            ?>

                    <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $request; ?></td>
                        <td><?php echo $row['dates']; ?></td>
                        <td><?php echo $row['account_type']; ?></td>
                        <td><?php echo $row['provided_email']; ?></td>
                        <td><?php echo $row['provided_id']; ?></td>
                        <td><?php echo $row['local_number']; ?></td>
                        <td><?php echo $row['software']; ?></td>
                        <td><?php echo $row['dept']; ?></td>
                        <td><?php echo $row['problem']; ?></td>
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
                            <?php echo $status ?>
                        </td>
                        <td><?php echo $row['accepted_by']; ?></td>
                        <td><?php echo $row['date_submitted']; ?></td>
                        <td><?php echo $row['date_modified']; ?></td>
                        <td>
                            <?php
                            if ($row['status'] == 1) { ?>
                                <a href="cancel.php?uid=<?php echo $row['id']; ?>" class="enable_cancel">cancel request</a>
                            <?php
                            } ?>
                            <?php
                            if ($row['status'] == 2 || $row['status'] == 3) { ?>
                                <a href="#" class="disable_cancel">accepted</a>
                            <?php
                            }
                            ?>
                            <?php
                            if ($row['status'] == 4) { ?>
                                <a href="cancel.php?uid=<?php echo $row['id']; ?>">click to remove</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            if ($row['status'] == 1 || $row['status'] == 2 || $row['status'] == 3) { ?>
                                <a href="view.php?uid=<?php echo $row['id']; ?>" class="disable_cancel">view</a>
                            <?php
                            } ?>
                            <?php
                            if ($row['status'] == 4) { ?>
                                <a href="view.php?uid=<?php echo $row['id']; ?>" class="enable_cancel">view</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>