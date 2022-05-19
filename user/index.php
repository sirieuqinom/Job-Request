<?php
session_start();
if (isset($_SESSION['ID'])) {
  if ($_SESSION["ROLE"] == "user") {
    header("Location:dbo.php");
    exit();
  }
}
// Include database connectivity

include_once('config.php');

if (isset($_POST['submit'])) {

  $errorMsg = "";

  $email = $con->real_escape_string($_POST['email']);
  $password = $con->real_escape_string(sha1($_POST['password']));

  if (!empty($email) || !empty($password)) {
    $query  = "SELECT * FROM users WHERE email = '$email'AND password = '$password' ";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $_SESSION["ID"] = $row['id'];
      $_SESSION["ROLE"] = $row['role'];
      $_SESSION["NAME"] = $row['name'];
      $_SESSION["EMAIL"] = $row['email'];

      if ($row['role'] == "UITC staff") {
        echo "
            <script>
                alert('wrong role ');
                window.location = 'index.php';
            </script>
            ";
        die();
      } elseif ($row['role'] == "user") {
        header("Location:dbo.php");
        die();
      }
    } else {
      $errorMsg = "Email or Password is Incorrect";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>UITC SUPPORT - USER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="index.css">
<body>
</head>

<body> 
<div class="bg">
  <div class="con">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6">
            <?php if (isset($errorMsg)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $errorMsg; ?>
            </div>
            <?php } ?>
            <br><br><br><br>
        <h1>Login to UITC Support</h1>
        <br><br>
        <form action="" method="POST">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <input class="form-control" name="email" placeholder="Enter email address" required>
            </div>
          </div>
          <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa-solid fa-key"></i>
                </div>
                <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
              <div class="input-group-addon">
                <i class="fa-solid fa-eye-slash" id="togglePassword" cursor="pointer"></i>
              </div>
            </div>
          </div>
          <div class="form-group"><br>
              <input type="submit" name="submit" class="btn_login" value="LOGIN">
              <br><br>
              <p>Not registered? <a class="reg" href="register.php">Create Account</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("fa-eye-slash");
            this.classList.toggle("fa-eye");
        });
    </script>   