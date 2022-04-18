<?php

    $conn = mysqli_connect("localhost","root","","request_form");

    if(isset($_POST['submit'])){
        $request = $_POST['request'];
        
        if($request == "daily time record"){
            $date = $_POST['dtr_date'];
        }
       
        if($request == "biometric record"){
            $date == $_POST['bio_date'];
        }
       
        $account_type = $_POST['account_type'];
        $provided_email = $_POST['provided_email'];
        $provided_id = $_POST['provided_id'];
        $dept = $_POST['department_tel'];
        $local_number = $_POST['local_number'];
        $dept = $_POST['software_installation'];
        $software = $_POST['software'];
        $dept = $_POST['internet_connection'];

        $sql = "INSERT into requests 
                (request,dates,account_type,provided_email,provided_id,dept,local_number,software) 
                VALUES 
                ('$request','$date','$account_type','$provided_email','$provided_id','$dept','$local_number',' $software')";
        $query = mysqli_query($conn,$sql);

        if($query){
            echo "
			    <script>
				    alert('YEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEET');
				    window.location = 'index.html';
			    </script>
			    ";
        }
        else{
            echo "
            <script>
                alert('SHEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEET');
                window.location = 'index.html';
            </script>
            ";
       }
    }
?>