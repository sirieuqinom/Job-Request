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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
    
        $sql = "SELECT * from requests";
        $sqlQuery = mysqli_query($conn,$sql);
		

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Job Request</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Submit a request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout :D</a>
                </li>
            </ul>
        </div>
    </nav>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
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