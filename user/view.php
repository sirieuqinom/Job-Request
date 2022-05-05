<?php

    include 'config.php';
    $temp_id = $_GET['uid'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="dashboard.php">return</a><br>
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
            <?php
            }
            ?>
            <?php
            if (!empty($row['account_type'])) { ?>
                <td><?php echo $row['account_type']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['provided_email'])) { ?>
                <td><?php echo $row['provided_email']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['provided_id'])) { ?>
                <td><?php echo $row['provided_id']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['local_number'])) { ?>
                <td><?php echo $row['local_number']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['softwware'])) { ?>
                <td><?php echo $row['software']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['dept'])) { ?>
                <td><?php echo $row['dept']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['problem'])) { ?>
                <td><?php echo $row['problem']; ?></td><br>
            <?php
            }
            ?>
            <?php
            if (!empty($row['email'])) { ?>
                <td><?php echo $row['email']; ?></td><br>
            <?php
            }
            ?>
    <?php
        }
    }
    ?>
    
</body>

</html>