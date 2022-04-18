<?php 

    include 'config.php';

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
    
        $sql = "SELECT * from requests";
        $sqlQuery = mysqli_query($conn,$sql);
		

    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>REQUESTS</th>
                <th>DATES</th>
                <th>ACCOUNT TYPE</th>
                <th>PROVIDED EMAIL</th>
                <th>PROVIDED ID</th>
                <th>LOCAL NUMBER</th>
                <th>SOFTWARE</th>
                <th>DEPARTMENT</th>
                <th>PROBLEM</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            
                if($sqlQuery){
                    while($row=mysqli_fetch_assoc($sqlQuery)){
                        $id = $row['id'];
                        $request = $row['request'];
                        $dates = $row['dates'];
                        $type = $row['account_type'];
                        $email = $row['provided_email'];
                        $pid = $row['provided_id'];
                        $number = $row['local_number'];
                        $software = $row['software'];
                        $dept = $row['dept'];
                        $problem = $row['problem'];

                        echo '
                        <tr>
                          <td>'.$id.'</td>
                          <td>'.$request.'</td>
                          <td>'.$dates.'</td>
                          <td>'.$type.'</td>
                          <td>'.$email.'</td>
                          <td>'.$pid.'</td>
                          <td>'.$number.'</td>
                          <td>'.$software.'</td>
                          <td>'.$dept.'</td>
                          <td>'.$problem.'</td>
                        </tr>
                        ';
                    }
                }
            
            ?>
        </tbody>
    </table>
</body>
</html>