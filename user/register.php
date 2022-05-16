<?php

// Include database connection file

include_once('config.php');

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
          window.location = 'index.php';
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
  <title>UITC SUPPORT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="bg">
  <br>
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
            <input type="text" value="user" name="role" hidden>
          </div>
          <div class="form-group">
            <p>Already registered? <a href="index.php">Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>