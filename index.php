<?php 

    include 'config.php';

?>

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
</head>
<body>
    <?php 
    
        $sql = "SELECT * from requests";
        $sqlQuery = mysqli_query($conn,$sql);
		

    ?>
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
            </div>
        </div>
    </nav>
    <table class="table table-bordered table-hover table-responsive-xl">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">REQUESTS</th>
                <th scope="col">DATES</th>
                <th scope="col">ACCOUNT TYPE</th>
                <th scope="col">PROVIDED EMAIL</th>
                <th scope="col">PROVIDED ID</th>
                <th scope="col">LOCAL NUMBER</th>
                <th scope="col">SOFTWARE</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">PROBLEM</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $num = 1;
                if($sqlQuery){
                    while($row=mysqli_fetch_assoc($sqlQuery)){
                        $id = $num;
                        $request = $row['request'];
                        $dates = $row['dates'];
                        $type = $row['account_type'];
                        $email = $row['provided_email'];
                        $pid = $row['provided_id'];
                        $number = $row['local_number'];
                        $software = $row['software'];
                        $dept = $row['dept'];
                        $problem = $row['problem'];
                        $status = $row['status'];

                        echo '
                        <tr>
                          <th scope="row">'.$id.'</th>
                          <td>'.$request.'</td>
                          <td>'.$dates.'</td>
                          <td>'.$type.'</td>
                          <td>'.$email.'</td>
                          <td>'.$pid.'</td>
                          <td>'.$number.'</td>
                          <td>'.$software.'</td>
                          <td>'.$dept.'</td>
                          <td>'.$problem.'</td>
                          <td>'.$status.'</td>
                        </tr>
                        ';
                        $num++;
                    }
                }
            
            ?>
        </tbody>
    </table>
</body>
</html>