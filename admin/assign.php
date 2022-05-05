<?php

include 'config.php';
$temp_id = $_GET['uid'];
//echo $temp_id;

if (isset($_POST['assign'])) {
    $task = $_POST['tasks'];
    $staffid = $temp_id;


    // echo $staffid;
    // echo $task;
    if ($task != 0) {
        $sql = "SELECT * from assigned_task where user_id = '$staffid' AND request_id = '$task'";

        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            echo "already assigned";
        } else {
            $sql = "INSERT into assigned_task 
                (user_id, request_id)
                VALUES 
                ('$staffid','$task')";
            $query = mysqli_query($con, $sql);
            if ($query) {
                echo "task assigned";
            } else {
                echo "error in assigning task";
            }
        }
    }
}
if (isset($_POST['remove'])) {
    $task = $_POST['tasks'];
    $staffid = $temp_id;

    if ($task != 0) {
        $sql = "DELETE from assigned_task where user_id = '$staffid' AND request_id = '$task'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            echo "task removed";
        }
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
    <a href="staff.php">return to staff list</a>

    <form action="" method="POST">
        <label for="tasks">Choose task to assign</label>
        <select name="tasks" id="tasks">
            <option value="0" selected hidden>Select an option</option>
            <option value="1">Daily Time Record</option>
            <option value="2">Biometric Record</option>
            <option value="3">Reset Password</option>
            <option value="4">Telephone Repair</option>
            <option value="5">Software Installation</option>
            <option value="6">Internet Connection</option>
            <option value="7">Publication/Update of info in Website</option>
            <option value="8">ICT repair equipment</option>
            <option value="9">Others</option>
        </select>
        <button type="submit" name="assign">Assign</button>
        <button type="submit" name="remove">Remove</button>
    </form>
    <?php

    $id = $temp_id;
    $sqltask = "SELECT * from assigned_task where user_id = '$id'";
    $querytask = mysqli_query($con, $sqltask);

    if ($querytask) {
        while ($row = mysqli_fetch_assoc($querytask)) {
            $reqid = $row['request_id'];

            $sqlgetreq = "SELECT * from request_type where request_id = '$reqid'";
            $sqlgetreqQuery = mysqli_query($con, $sqlgetreq);

            if ($sqlgetreqQuery) {
                while ($rows = mysqli_fetch_assoc($sqlgetreqQuery)) {
                    $requests = $row['request_id'];
                    if ($requests == 1) {
                        echo 'Daily Time Record';
                        echo "<br>";
                    }
                    if ($requests == 2) {
                        echo 'Biometric Record';
                        echo "<br>";
                    }
                    if ($requests == 3) {
                        echo 'Reset Password';
                        echo "<br>";
                    }
                    if ($requests == 4) {
                        echo 'Telephone Repair';
                        echo "<br>";
                    }
                    if ($requests == 5) {
                        echo 'Software Installation';
                        echo "<br>";
                    }
                    if ($requests == 6) {
                        echo 'Internet Connection';
                        echo "<br>";
                    }
                    if ($requests == 7) {
                        echo 'Publication/Update of info in Website';
                        echo "<br>";
                    }
                    if ($requests == 8) {
                        echo 'ICT repair equipment';
                        echo "<br>";
                    }
                    if ($requests == 9) {
                        echo 'Others';
                        echo "<br>";
                    }
                }
            }
        }
    }

    ?>
</body>

</html>