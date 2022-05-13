<?php

    include 'config.php';
    session_start();
    $temp_id = $_GET['uid'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <a href="dashboard.php">return</a><br>
    <form action="generate_pdf.php?=<?php echo $temp_id;?>" method="post">
        <button type="submit" name="btn_pdf"> PDF </button>
    
    <?php
    $select = "SELECT * from requests where id = '$temp_id'";
    $sqlselect = mysqli_query($con, $select);
    ?>
    <?php
    if ($sqlselect) {
        while ($row = mysqli_fetch_assoc($sqlselect)) {
            $reqid = $row['request'];

            $sqlreq = "SELECT * from request_type where request_id ='$reqid'";
            $sqlreqQuery = mysqli_query($con, $sqlreq);
            if ($sqlreqQuery) {
                while ($rows = mysqli_fetch_assoc($sqlreqQuery)) {
                    $request = $rows['request'];
                }
            }
    ?>
            <td><?php echo $request; ?></td> <br>
            <?php
            if (!empty($row['dates'])) { ?>
                <td><?php echo $row['dates']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['account_type'])) { ?>
                <td><?php echo $row['account_type']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['provided_email'])) { ?>
                <td><?php echo $row['provided_email']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['provided_id'])) { ?>
                <td><?php echo $row['provided_id']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['local_number'])) { ?>
                <td><?php echo $row['local_number']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['softwware'])) { ?>
                <td><?php echo $row['software']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['dept'])) { ?>
                <td><?php echo $row['dept']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['problem'])) { ?>
                <td><?php echo $row['problem']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
            <?php
            if (!empty($row['email'])) { ?>
                <td><?php echo $row['email']; ?></td><br>
                <input type="hidden" name="hidden-id" value="<?php echo $temp_id;?>">
            <?php
            }
            ?>
    <?php
        }
    }
    ?>
    </form>
</body>

</html>