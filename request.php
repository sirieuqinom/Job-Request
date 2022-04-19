<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Request form</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Job Request</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Dashboard</a>
                <a class="nav-item nav-link active" href="#">Submit request</a>
                <a class="nav-item nav-link" href="#">Logout</a>
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
        <form action="insert.php" method="post" class="daily_time_record REQUEST">
            <input type="text" name="request" id="request" value="daily time record" readonly hidden>
            <label for="dtr_date">
                Enter Requested Date <br>
                <input type="text" name="dtr_date" id="dtr_date" required>
            </label><br>
            <div>   
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" class="biometric_record REQUEST">
            <input type="text" name="request" id="request" value="biometric record" readonly hidden>
            <label for="bio_date">
                Enter Requested Date <br>
                <input type="text" name="bio_date" id="bio_date" required>
            </label>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>  
        </form>
        <form action="insert.php" method="post" class="reset_password REQUEST">
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
        <form action="insert.php" method="post" class="telephone_repair REQUEST">
            <input type="text" name="request" id="request" value="telephone repair" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="department_tel" id="cos tel" value="cos">
            <label for="cos tel">COS</label>
            <input type="radio" name="department_tel" id="cla tel" value="cla">
            <label for="cla tel">CLA</label>
            <input type="radio" name="department_tel" id="cie tel" value="cie">
            <label for="cie tel">CIE</label>
            <input type="radio" name="department_tel" id="cafa tel" value="cafa">
            <label for="cafa tel">CAFA</label>
            <input type="radio" name="department_tel" id="coe tel" value="coe">
            <label for="coe tel">COE</label>
            <input type="radio" name="department_tel" id="cit tel" value="cit">
            <label for="cit tel">CIT</label>
            <input type="radio" name="department_tel" id="irtc tel" value="irtc">
            <label for="irtc tel">IRTC</label>
            <br>
            
            <label for="local_number">
                Enter the local telephone number <br>
                <input type="number" name="local_number" id="local_number" required>
            </label><br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div> 
        </form>
        <form action="insert.php" method="post" class="software_installation REQUEST">
            <input type="text" name="request" id="request" value="software installation" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="software_installation" id="cos soft" value="cos">
            <label for="cos soft">COS</label>
            <input type="radio" name="software_installation" id="cla soft" value="cla">
            <label for="cla soft">CLA</label>
            <input type="radio" name="software_installation" id="cie soft" value="cie">
            <label for="cie soft">CIE</label>
            <input type="radio" name="software_installation" id="cafa soft" value="cafa">
            <label for="cafa soft">CAFA</label>
            <input type="radio" name="software_installation" id="coe soft" value="coe">
            <label for="coe soft">COE</label>
            <input type="radio" name="software_installation" id="cit soft" value="cit">
            <label for="cit soft">CIT</label>
            <input type="radio" name="software_installation" id="irtc soft" value="irtc">
            <label for="irtc soft">IRTC</label>
            <br>

            <label for="software">
                Enter software to be installed <br>
                <input type="text" name="software" id="software" required>
            </label><br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" class="internet_connection REQUEST">
            <input type="text" name="request" id="request" value="internet connection" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="internet_connection" id="cos net" value="cos">
            <label for="cos net">COS</label>
            <input type="radio" name="internet_connection" id="cla net" value="cla">
            <label for="cla net">CLA</label>
            <input type="radio" name="internet_connection" id="cie net" value="cie">
            <label for="cie net">CIE</label>
            <input type="radio" name="internet_connection" id="cafa net" value="cafa">
            <label for="cafa net">CAFA</label>
            <input type="radio" name="internet_connection" id="coe net" value="coe">
            <label for="coe net">COE</label>
            <input type="radio" name="internet_connection" id="cit net" value="cit">
            <label for="cit net">CIT</label>
            <input type="radio" name="internet_connection" id="irtc net" value="irtc">
            <label for="irtc net">IRTC</label>
            <br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" class="publication_update_of_info_in_website REQUEST">
            <input type="text" name="request" id="request" value="publication update of info in website" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="publication_update_of_info_in_website" id="cos pub" value="cos">
            <label for="cos pub">COS</label>
            <input type="radio" name="publication_update_of_info_in_website" id="cla pub" value="cla">
            <label for="cla pub">CLA</label>
            <input type="radio" name="publication_update_of_info_in_website" id="cie pub" value="cie">
            <label for="cie pub">CIE</label>
            <input type="radio" name="publication_update_of_info_in_website" id="cafa pub" value="cafa">
            <label for="cafa pub">CAFA</label>
            <input type="radio" name="publication_update_of_info_in_website" id="coe pub" value="coe">
            <label for="coe pub">COE</label>
            <input type="radio" name="publication_update_of_info_in_website" id="cit pub" value="cit">
            <label for="cit pub">CIT</label>
            <input type="radio" name="publication_update_of_info_in_website" id="irtc pub" value="irtc">
            <label for="irtc pub">IRTC</label>
            <br>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" class="ict_repair_equipment REQUEST">
            <input type="text" name="request" id="request" value="ict repair equipment" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="ict_repair_equipment" id="cos rep" value="cos">
            <label for="cos rep">COS</label>
            <input type="radio" name="ict_repair_equipment" id="cla rep" value="cla">
            <label for="cla rep">CLA</label>
            <input type="radio" name="ict_repair_equipment" id="cie rep" value="cie">
            <label for="cie rep">CIE</label>
            <input type="radio" name="ict_repair_equipment" id="cafa rep" value="cafa">
            <label for="cafa rep">CAFA</label>
            <input type="radio" name="ict_repair_equipment" id="coe rep" value="coe">
            <label for="coe rep">COE</label>
            <input type="radio" name="ict_repair_equipment" id="cit rep" value="cit">
            <label for="cit rep">CIT</label>
            <input type="radio" name="ict_repair_equipment" id="irtc rep" value="irtc">
            <label for="irtc rep">IRTC</label>
            <br>

            <label for="specified_problem">
                Please Specify Problem <br>
                <input type="text" name="specified_problem" id="specified_problem" required>
            </label>
            <div>
                <br><button type="submit" name="submit">Submit</button>
            </div>
        </form>
        <form action="insert.php" method="post" class="others REQUEST">
            <input type="text" name="request" id="request" value="others" readonly hidden>
            <label>Choose a department</label><br>

            <input type="radio" name="others" id="cos oth" value="cos">
            <label for="cos oth">COS</label>
            <input type="radio" name="others" id="cla oth" value="cla">
            <label for="cla oth">CLA</label>
            <input type="radio" name="others" id="cie oth" value="cie">
            <label for="cie oth">CIE</label>
            <input type="radio" name="others" id="cafa oth" value="cafa">
            <label for="cafa oth">CAFA</label>
            <input type="radio" name="others" id="coe oth" value="coe">
            <label for="coe oth">COE</label>
            <input type="radio" name="others" id="cit oth" value="cit">
            <label for="cit oth">CIT</label>
            <input type="radio" name="others" id="irtc oth" value="irtc">
            <label for="irtc oth">IRTC</label>
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