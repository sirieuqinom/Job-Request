<?php

include 'config.php';
session_start();

$temp_id = $_GET['nid'];
$name = $_SESSION["NAME"];


if (isset($_POST['update'])) {

    $status = $_POST['status'];

    $sql = "UPDATE requests set accepted_by = '$name', status = '$status' where id = '$temp_id'";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "
         <script>
          alert('Update Success');
          window.location = 'staffdashboard.php';
        </script>
        ";
    }
}

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
            <td><?php echo $_SESSION['NAME']; ?></td>
    <?php
        }
    }
    ?>


    <a href="staffdashboard.php">return to dashboard</a>
    <form action="" method="POST">
        <select name="status" id="status">
            <option value="1">pending</option>
            <option value="2">accepted</option>
            <option value="3">ongoing</option>
            <option value="4">finished</option>
        </select>
        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>