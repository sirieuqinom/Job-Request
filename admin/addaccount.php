<?php

include 'config.php';
session_start();

if (empty($_SESSION["EMAIL"])) {
    echo "
			    <script>
				    alert('NO LOGIN DETECTED. REDIRECTING TO LOGIN PAGE');
				    window.location = 'index.php';
			    </script>
			    ";
}

if (isset($_POST['submit'])) {

    $check = $_POST['email'];
    $sql = "SELECT email from users where email = '$check'";

    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $errorMsg  = "User Already Exists";
    } else {

        $email    = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string(sha1($_POST['password']));
        $name     = $con->real_escape_string($_POST['name']);
        $uid      = $con->real_escape_string($_POST['user_id']);
        $uoc      = $con->real_escape_string($_POST['user_office_course']);
        $bionum   = $con->real_escape_string($_POST['bio_num']);
        $role     = $con->real_escape_string($_REQUEST['role']);

        $query  = "INSERT INTO users (name,user_id,user_office_course,bio_num,email,password,role) VALUES ('$name','$uid','$uoc','$bionum','$email','$password','$role')";
        $result = $con->query($query);

        if ($result) {
            echo "
        <script>
          alert('register success');
          window.location = 'admindashboard.php';
        </script>
      ";
        } else {
            $errorMsg  = "You are not Registred..Please Try again";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Job Request</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="admindashboard.php">Requests</a>
                <a class="nav-item nav-link" href="staff.php">Staff</a>
                <a class="nav-item nav-link" href="users.php">Users</a>
                <a class="nav-item nav-link active" href="addaccount.php">Add Account</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" style="pointer-events:none"> <?php echo $_SESSION["NAME"]; ?></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $errorMsg; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                    </div>
                    <div>
            <label for="user_id">enter your ID number:</label>
            <input type="text" class="form-control" name="user_id" placeholder="Enter ID" required="">
          </div>
          <div>
            <label for="user_office_course">enter office or course</label>
            <input type="text" class="form-control" name="user_office_course" placeholder="Enter office/course" required="">
          </div>
          <div>
            <label for="bio_num">enter biometrics num (if employee only!!!):</label>
            <input type="number" class="form-control" name="bio_num" placeholder="Enter Biometric Number">
          </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                    </div>
                    <div class="form-group">
                        <select name="role" id="role">
                            <option value="user" name="role">user</option>
                            <option value="UITC staff" name="role">UITC staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>