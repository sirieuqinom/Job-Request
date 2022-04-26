<?php
session_start();
if (isset($_SESSION['ID'])) {
    if ($_SESSION["ROLE"] == "admin") {
        header("Location:admindashboard.php");
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

            if ($row['role'] == "admin") {
                header("Location:admindashboard.php");
                die();
            } elseif ($row['role'] == "user") {
                echo "
            <script>
                alert('incorrect email or password');
                window.location = 'index.php';
            </script>
            ";
                die();
            } elseif ($row['role'] == "UITC staff") {
                echo "
            <script>
                alert('incorrect email or password');
                window.location = 'index.php';
            </script>
            ";
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
    <title>UITC ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="card text-center" style="padding:20px;">
        <h3>UITC ADMIN</h3>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $errorMsg; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="myInput" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <label for="showpass">
                        <input type="checkbox" name="showpass" id="showpass" onclick="myFunction()">
                        Show Password
                    </label>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>