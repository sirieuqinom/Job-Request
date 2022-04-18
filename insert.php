<?php

    include "config.php";

    if(isset($_POST['submit'])){
        $request = $_POST['request'];
        
        if($request == "daily time record"){
            $date = $_POST['dtr_date'];
        }
       
        if($request == "biometric record"){
            $date = $_POST['bio_date'];
        }

        if($request == "reset password"){
            $account_type = $_POST['account_type'];
            $provided_email = $_POST['provided_email'];
            $provided_id = $_POST['provided_id'];
        }

        if($request == "telephone repair"){
            $dept = $_POST['department_tel'];
            $local_number = $_POST['local_number'];
        }
        
        if($request == "software installation"){
            $dept = $_POST['software_installation'];
            $software = $_POST['software'];
        }
        
        if($request == "internet connection"){
            $dept = $_POST['internet_connection'];
        }

        if($request == "publication update of info in website"){
            $dept = $_POST['publication_update_of_info_in_website'];
        }

        if($request == 'ict repair equipment'){
            $dept = $_POST['ict_repair_equipment'];
            $problem = $_POST['specified_problem'];
        }

        if($request == "others"){
            $dept = $_POST['others'];
            $problem = $_POST['specified_request'];
        }
       
        $sql = "INSERT into requests 
                (request,dates,account_type,provided_email,provided_id,
                dept,local_number,software,problem) 
                VALUES 
                ('$request','$date','$account_type','$provided_email','$provided_id',
                '$dept','$local_number','$software','$problem')";
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