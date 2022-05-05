<?php

include 'config.php';
$tempid = $_GET['uid'];

$sql = "DELETE from requests where id = '$tempid'";
$sqlQuery = mysqli_query($con, $sql);


echo "
    <script>
        alert('Request Removed');
		window.location = 'dashboard.php';
    </script>
";
