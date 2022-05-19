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
    <link rel="stylesheet" href="index.css">
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
<div class="bg">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Job Request</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="request.php">Submit request</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" style="pointer-events:none"> <?php echo $_SESSION["EMAIL"]; ?></a>

            </div>
        </div>
    </nav>
    <table class="table table-hover table-responsive-xl">
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
            <tr class='clickable-row' data-href='view.php?uid=<?php echo $row['id']; ?>'>
                <td><?php echo $request; ?><br><br>
                    <?php echo "Requested: ", $row['date_submitted']; ?><br>
                    <?php  echo "Accepted by: ", $row['accepted_by']; ?></td>     
                <td><br>
                    <?php
                        if ($row['status'] == 1) {
                            $status = "PENDING";
                        }
                        if ($row['status'] == 2) {
                            $status = "ACCEPTED";
                        }
                        if ($row['status'] == 3) {
                            $status = "ONGOING";
                        }
                        if ($row['status'] == 4) {
                            $status = "FINISHED";
                        }
                    ?>
                    <?php echo $status ?>
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