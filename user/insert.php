<?php
session_start();
include "config.php";

if (isset($_POST['submit'])) {
    $request = $_POST['request'];

    if ($request == "1") {
        $date = $_POST['dtr_date'];
    }

    if ($request == "2") {
        $date = $_POST['bio_date'];
    }

    if ($request == "3") {
        $account_type = $_POST['account_type'];
        $provided_email = $_POST['provided_email'];
        $provided_id = $_POST['provided_id'];
    }

    if ($request == "4") {
        $dept = $_POST['department_tel'];
        $local_number = $_POST['local_number'];
    }

    if ($request == "5") {
        $dept = $_POST['software_installation'];
        $software = $_POST['software'];
    }

    if ($request == "6") {
        $dept = $_POST['internet_connection'];
    }

    if ($request == "7") {
        $dept = $_POST['publication_update_of_info_in_website'];
    }

    if ($request == '8') {
        $dept = $_POST['ict_repair_equipment'];
        $problem = $_POST['specified_problem'];
    }

    if ($request == "9") {
        $dept = $_POST['others'];
        $problem = $_POST['specified_request'];
    }
    $sdate = date("Y-M-d");
    $sess = $_SESSION["EMAIL"];
    $sql = "INSERT into requests 
                (request,dates,account_type,provided_email,provided_id,
                dept,local_number,software,problem, date_submitted, email) 
                VALUES 
                ('$request','$date','$account_type','$provided_email','$provided_id',
                '$dept','$local_number','$software','$problem','$sdate','$sess')";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "
			    <script>
				    alert('Request Submitted');
				    window.location = 'dashboard.php';
			    </script>
			    ";
    } else {
        echo "
            <script>
                alert('Error with submition');
                window.location = 'request.php';
            </script>
            ";
    }
}
