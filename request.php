<?php

    session_start();
    if(empty($_SESSION["EMAIL"])){
        echo "
			    <script>
				    alert('SESSION ENDED. REDIRECTING TO LOGIN PAGE');
				    window.location = 'index.php';
			    </script>
			    ";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <title>Request form</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".REQUEST").not("."+optionValue).hide();
                    $("."+optionValue).show();
                }else{
                    $(".REQUEST").hide();
                }
            });
        }).change();
    });
</script>
<body>
    <nav CLAss="navbar navbar-expand-lg navbar-light bg-light">
        <a CLAss="navbar-brand" href="index.php">Job Request</a>
        <button CLAss="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span CLAss="navbar-toggler-icon"></span>
        </button>
        <div CLAss="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div CLAss="navbar-nav">
                <a CLAss="nav-item nav-link" href="dashboard.php">Dashboard</a>
                <a CLAss="nav-item nav-link active" href="#">Submit request</a>
                <a CLAss="nav-item nav-link" href="logout.php">Logout</a>
                <a class="nav-item nav-link" style="pointer-events:none"> <?php echo $_SESSION["EMAIL"]; ?></a>
            </div>
        </div>
    </nav>
    <div>
        <select name="request" id="request">
            <option value="0" selected hidden >Select an option</option>
            <option value="daily_time_record">Daily Time Record</option>
            <option value="biometric_record">Biometric Record</option>
            <option value="reset_password">Reset Password</option>
            <option value="telephone_repair">Telephone Repair</option>
            <option value="software_installation">Software Installation</option>
            <option value="internet_connection">Internet Connection</option>
            <option value="publication_update_of_info_in_website">Publication/Update of info in Website</option>
            <option value="ict_repair_equipment">ICT repair equipment</option>
            <option value="others">Others</option>
        </select>
    </div>
    <div>
        <form action="insert.php" method="post" CLAss="daily_time_record REQUEST">
            <input type="text" name="request" id="request" value="daily time record" readonly hidden>
            <label for="dtr_date">
                Enter Requested Date <br>
                <input type="text" name="dtr_date" id="dtr_date" required>
            </label><br>
            <div>   
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" CLAss="biometric_record REQUEST">
            <input type="text" name="request" id="request" value="biometric record" readonly hidden>
            <label for="bio_date">
                Enter Requested Date <br>
                <input type="text" name="bio_date" id="bio_date" required>
            </label>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>  
        </form>
        <form action="insert.php" method="post" CLAss="reset_password REQUEST">
            <input type="text" name="request" id="request" value="reset password" readonly hidden>
            <label>Choose account type</label>
            <div>
                <input type="radio" name="account_type" id="tup_portal" value="TUP Portal">
                <label for="tup_portal">TUP Portal</label><br>
                <input type="radio" name="account_type" id="tup_official_email" value="TUP Official Email">
                <label for="tup_official_email">TUP Official Email</label><br>
                <input type="radio" name="account_type" id="tup_web_ers" value="TUP Web ERS">
                <label for="tup_web_ers">TUP Web ERS</label><br>
                <input type="radio" name="account_type" id="ers_old" value="ERS Old">
                <label for="ers_old">ERS [old]</label><br>
            </div>  
            <label for="provided_email">
                Enter an email address <br>
                <input type="email" name="provided_email" id="provided_email" required>
            </label><br>
            <label for="provided_id">
                Enter an ID <br>
                <input type="text" name="provided_id" id="provided_id" required>
            </label><br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div> 
        </form>
        <form action="insert.php" method="post" CLAss="telephone_repair REQUEST">
            <input type="text" name="request" id="request" value="telephone repair" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="department_tel" id="COS tel" value="COS">
            <label for="COS tel">COS</label>
            <input type="radio" name="department_tel" id="CLA tel" value="CLA">
            <label for="CLA tel">CLA</label>
            <input type="radio" name="department_tel" id="CIE tel" value="CIE">
            <label for="CIE tel">CIE</label>
            <input type="radio" name="department_tel" id="CAFA tel" value="CAFA">
            <label for="CAFA tel">CAFA</label>
            <input type="radio" name="department_tel" id="COE tel" value="COE">
            <label for="COE tel">COE</label>
            <input type="radio" name="department_tel" id="CIT tel" value="CIT">
            <label for="CIT tel">CIT</label>
            <input type="radio" name="department_tel" id="IRTC tel" value="IRTC">
            <label for="IRTC tel">IRTC</label>
            <br>
            
            <label for="local_number">
                Enter the local telephone number <br>
                <input type="number" name="local_number" id="local_number" required>
            </label><br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div> 
        </form>
        <form action="insert.php" method="post" CLAss="software_installation REQUEST">
            <input type="text" name="request" id="request" value="software installation" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="software_installation" id="COS soft" value="COS">
            <label for="COS soft">COS</label>
            <input type="radio" name="software_installation" id="CLA soft" value="CLA">
            <label for="CLA soft">CLA</label>
            <input type="radio" name="software_installation" id="CIE soft" value="CIE">
            <label for="CIE soft">CIE</label>
            <input type="radio" name="software_installation" id="CAFA soft" value="CAFA">
            <label for="CAFA soft">CAFA</label>
            <input type="radio" name="software_installation" id="COE soft" value="COE">
            <label for="COE soft">COE</label>
            <input type="radio" name="software_installation" id="CIT soft" value="CIT">
            <label for="CIT soft">CIT</label>
            <input type="radio" name="software_installation" id="IRTC soft" value="IRTC">
            <label for="IRTC soft">IRTC</label>
            <br>

            <label for="software">
                Enter software to be installed <br>
                <input type="text" name="software" id="software" required>
            </label><br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" CLAss="internet_connection REQUEST">
            <input type="text" name="request" id="request" value="internet connection" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="internet_connection" id="COS net" value="COS">
            <label for="COS net">COS</label>
            <input type="radio" name="internet_connection" id="CLA net" value="CLA">
            <label for="CLA net">CLA</label>
            <input type="radio" name="internet_connection" id="CIE net" value="CIE">
            <label for="CIE net">CIE</label>
            <input type="radio" name="internet_connection" id="CAFA net" value="CAFA">
            <label for="CAFA net">CAFA</label>
            <input type="radio" name="internet_connection" id="COE net" value="COE">
            <label for="COE net">COE</label>
            <input type="radio" name="internet_connection" id="CIT net" value="CIT">
            <label for="CIT net">CIT</label>
            <input type="radio" name="internet_connection" id="IRTC net" value="IRTC">
            <label for="IRTC net">IRTC</label>
            <br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" CLAss="publication_update_of_info_in_website REQUEST">
            <input type="text" name="request" id="request" value="publication update of info in website" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="publication_update_of_info_in_website" id="COS pub" value="COS">
            <label for="COS pub">COS</label>
            <input type="radio" name="publication_update_of_info_in_website" id="CLA pub" value="CLA">
            <label for="CLA pub">CLA</label>
            <input type="radio" name="publication_update_of_info_in_website" id="CIE pub" value="CIE">
            <label for="CIE pub">CIE</label>
            <input type="radio" name="publication_update_of_info_in_website" id="CAFA pub" value="CAFA">
            <label for="CAFA pub">CAFA</label>
            <input type="radio" name="publication_update_of_info_in_website" id="COE pub" value="COE">
            <label for="COE pub">COE</label>
            <input type="radio" name="publication_update_of_info_in_website" id="CIT pub" value="CIT">
            <label for="CIT pub">CIT</label>
            <input type="radio" name="publication_update_of_info_in_website" id="IRTC pub" value="IRTC">
            <label for="IRTC pub">IRTC</label>
            <br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" CLAss="ict_repair_equipment REQUEST">
            <input type="text" name="request" id="request" value="ict repair equipment" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="ict_repair_equipment" id="COS rep" value="COS">
            <label for="COS rep">COS</label>
            <input type="radio" name="ict_repair_equipment" id="CLA rep" value="CLA">
            <label for="CLA rep">CLA</label>
            <input type="radio" name="ict_repair_equipment" id="CIE rep" value="CIE">
            <label for="CIE rep">CIE</label>
            <input type="radio" name="ict_repair_equipment" id="CAFA rep" value="CAFA">
            <label for="CAFA rep">CAFA</label>
            <input type="radio" name="ict_repair_equipment" id="COE rep" value="COE">
            <label for="COE rep">COE</label>
            <input type="radio" name="ict_repair_equipment" id="CIT rep" value="CIT">
            <label for="CIT rep">CIT</label>
            <input type="radio" name="ict_repair_equipment" id="IRTC rep" value="IRTC">
            <label for="IRTC rep">IRTC</label>
            <br>

            <label for="specified_problem">
                Please Specify Problem <br>
                <input type="text" name="specified_problem" id="specified_problem" required>
            </label>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" CLAss="others REQUEST">
            <input type="text" name="request" id="request" value="others" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="others" id="COS oth" value="COS">
            <label for="COS oth">COS</label>
            <input type="radio" name="others" id="CLA oth" value="CLA">
            <label for="CLA oth">CLA</label>
            <input type="radio" name="others" id="CIE oth" value="CIE">
            <label for="CIE oth">CIE</label>
            <input type="radio" name="others" id="CAFA oth" value="CAFA">
            <label for="CAFA oth">CAFA</label>
            <input type="radio" name="others" id="COE oth" value="COE">
            <label for="COE oth">COE</label>
            <input type="radio" name="others" id="CIT oth" value="CIT">
            <label for="CIT oth">CIT</label>
            <input type="radio" name="others" id="IRTC oth" value="IRTC">
            <label for="IRTC oth">IRTC</label>
            <br>

            <label for="specified_request">
                Please Specify your Request <br>
                <input type="text" name="specified_request" id="specified_request" required>
            </label>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>