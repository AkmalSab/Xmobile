<?php 

include '../phpFunction.php';
startSession();

$conn = dbConfig();

//  echo $_GET['u'];

//create sql query
$selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");

// bind parameters for makers
mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);

// execute prepared statement
mysqli_stmt_execute($selectQuery);

// bind result variables
mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);

mysqli_stmt_fetch($selectQuery);

mysqli_stmt_close($selectQuery);

// echo 'ID->'.$ID;
// echo $NAME;
// echo $USERNAME;
// echo $PASSWORD;
// echo $EMAIL;
// echo $STATUS;    

if(isset($_POST['updateAccount'])){

    //retrieve user's input
    $CustomerUsername = mysqli_real_escape_string($conn,$_POST['CustomerUsername']);
    $CustomerName = mysqli_real_escape_string($conn,$_POST['CustomerName']);
    $CustomerEmail = mysqli_real_escape_string($conn,$_POST['CustomerEmail']);
    $CustomerPhoneNo = mysqli_real_escape_string($conn,$_POST['CustomerPhoneNo']);    
    $CustomerPassword = mysqli_real_escape_string($conn,$_POST['CustomerPassword']);
    $CustomerConfirmPassword = mysqli_real_escape_string($conn,$_POST['CustomerConfirmPassword']);

    if($NAME != $CustomerName){
        //echo 'need to update customer name <br>';
        $updateQuery = "UPDATE CUSTOMER SET CUSTOMER_NAME = ? WHERE CUSTOMER_ID = ?;";
        $updateResult = mysqli_prepare($conn,$updateQuery);        
        mysqli_stmt_bind_param($updateResult, 'ss', $CustomerName, $_GET['u']);
        mysqli_stmt_execute($updateResult);
        mysqli_stmt_close($updateResult);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Nice!</strong> your name has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        //create sql query
        $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");
        // bind parameters for makers
        mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);
        // execute prepared statement
        mysqli_stmt_execute($selectQuery);
        // bind result variables
        mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);
        mysqli_stmt_fetch($selectQuery);
        mysqli_stmt_close($selectQuery);
    }
    if($USERNAME != $CustomerUsername){
        //echo 'need to update customer username <br>';
        $hashedUsername = md5($CustomerUsername);    
        $updateQuery = "UPDATE CUSTOMER SET CUSTOMER_USERNAME = ? WHERE CUSTOMER_ID = ?;";
        $updateResult = mysqli_prepare($conn,$updateQuery);        
        mysqli_stmt_bind_param($updateResult, 'ss', $hashedUsername, $_GET['u']);
        mysqli_stmt_execute($updateResult);
        mysqli_stmt_close($updateResult);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Nice!</strong> your username has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        //create sql query
        $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");
        // bind parameters for makers
        mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);
        // execute prepared statement
        mysqli_stmt_execute($selectQuery);
        // bind result variables
        mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);
        mysqli_stmt_fetch($selectQuery);
        mysqli_stmt_close($selectQuery);
    }
    if($EMAIL != $CustomerEmail){
        //echo 'need to update customer emel <br>';
        $updateQuery = "UPDATE CUSTOMER SET CUSTOMER_EMAIL = ? WHERE CUSTOMER_ID = ?;";
        $updateResult = mysqli_prepare($conn,$updateQuery);        
        mysqli_stmt_bind_param($updateResult, 'ss', $CustomerEmail, $_GET['u']);
        mysqli_stmt_execute($updateResult);
        mysqli_stmt_close($updateResult);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Nice!</strong> your email has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        //create sql query
        $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");
        // bind parameters for makers
        mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);
        // execute prepared statement
        mysqli_stmt_execute($selectQuery);
        // bind result variables
        mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);
        mysqli_stmt_fetch($selectQuery);
        mysqli_stmt_close($selectQuery);
        
    }
    if($PHONE != $CustomerPhoneNo){
        //echo 'need to update customer phone <br>';
        $updateQuery = "UPDATE CUSTOMER SET CUSTOMER_PHONE = ? WHERE CUSTOMER_ID = ?;";
        $updateResult = mysqli_prepare($conn,$updateQuery);        
        mysqli_stmt_bind_param($updateResult, 'ss', $CustomerPhoneNo, $_GET['u']);
        mysqli_stmt_execute($updateResult);
        mysqli_stmt_close($updateResult);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Nice!</strong> your phone number has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        //create sql query
        $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");
        // bind parameters for makers
        mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);
        // execute prepared statement
        mysqli_stmt_execute($selectQuery);
        // bind result variables
        mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);
        mysqli_stmt_fetch($selectQuery);
        mysqli_stmt_close($selectQuery);
    }
    if($PASSWORD != $CustomerPassword){
        //echo 'need to update customer password <br>';
        if($CustomerPassword != $CustomerConfirmPassword){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> your password and confirm password does not match!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        else{
            $hashedPassword = md5($CustomerPassword);
            $updateQuery = "UPDATE CUSTOMER SET CUSTOMER_PASSWORD = ? WHERE CUSTOMER_ID = ?;";
            $updateResult = mysqli_prepare($conn,$updateQuery);        
            mysqli_stmt_bind_param($updateResult, 'ss', $hashedPassword, $_GET['u']);
            mysqli_stmt_execute($updateResult);
            mysqli_stmt_close($updateResult);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Nice!</strong> your password has been updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            //create sql query
            $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_ID = ?;");
            // bind parameters for makers
            mysqli_stmt_bind_param($selectQuery, "s", $_GET['u']);
            // execute prepared statement
            mysqli_stmt_execute($selectQuery);
            // bind result variables
            mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS);
            mysqli_stmt_fetch($selectQuery);
            mysqli_stmt_close($selectQuery);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!--basic template-->
  <meta charset="UTF-8">
  <meta name="Description" content="Workshop 2 UTeM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Profile</title>

  <!-- muaadh edit -->    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <link href="cssmuaadh/slick.css" rel="stylesheet">
  <link href="cssmuaadh/slick-theme.css" rel="stylesheet">
  <link href="cssmuaadh/nouislider.min.css" rel="stylesheet">
  <link href="cssmuaadh/font-awesome.min.css" rel="stylesheet">
  <link href="cssmuaadh/style.css" rel="stylesheet">
  <link href="cssmuaadh/home.scss" rel="stylesheet">

  <!-- akmalsab edit -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container center">
        <br>
        <div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">
                    <b>Only edit the part which you want to update!</b> please leave the rest as it is if you don't want to update it
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <p class="h1 d-none d-sm-none d-md-block d-lg-block d-xl-block">Profile Update</p>
                <p class="h3 d-sm-block d-md-none d-lg-none d-xl-none">Profile Update</p>
            </div>            
        </div>
        <div class="row">
            <div class="col align-items-center justify-content-center">
                <form action="#" method="POST" class="needs-validation" novalidate>    
                    <div class="form-group">
                        <label for="CustomerUsername">Username:</label>
                        <!-- $ID, $NAME, $USERNAME, $PASSWORD , $EMAIL, $PHONE, $STATUS -->
                        <input id="CustomerUsername" name="CustomerUsername" type="text" class="form-control" required value="<?php echo $USERNAME; ?>">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your username!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CustomerName">Name:</label>
                        <input id="CustomerName" name="CustomerName" type="text" class="form-control" required value="<?php echo $NAME; ?>" oninput="this.value = this.value.toUpperCase()">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your name!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CustomerEmail">Email:</label>
                        <input id="CustomerEmail" name="CustomerEmail" type="text" class="form-control" required value="<?php echo $EMAIL; ?>">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your email!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CustomerPhoneNo">Phone Number:</label>
                        <input id="CustomerPhoneNo" name="CustomerPhoneNo" type="text" class="form-control" onkeypress="return onlyNumberKey(event)" required value="<?php echo $PHONE; ?>" maxlength="12" minlength="10">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your phone number!
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="CustomerPassword">Password:</label>
                        <input id="CustomerPassword" oninput="validate()" name="CustomerPassword" type="password" class="form-control" required value="<?php echo $PASSWORD; ?>">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your password!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CustomerConfirmPassword">Confirm Password:</label>
                        <input id="CustomerConfirmPassword" oninput="validate()" name="CustomerConfirmPassword" type="password" class="form-control" required value="<?php echo $PASSWORD; ?>">
                        <div id="not_matched"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <button type="submit" class="btn btn-primary btn-block" id="createAccountButton" name="updateAccount">Update</button>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <button type="reset" class="btn btn-secondary btn-block" id="resetButton" onclick="clearValidate()">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="back" class="align-content-end"><a href="userProfile.php"><u>Back to Profile</u></a></label>
                    </div>
                </form>     
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() 
                    {
                      'use strict';
                      window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                          form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                              event.preventDefault();
                              event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                          }, false);
                        });
                      }, false);
                    })();    
                    
                    
                    function validate(pass,confirmpass){
                        var reset = document.getElementById("resetButton");
                        var submit = document.getElementById("createAccountButton");
                        var result = document.getElementById("not_matched");
                        var pass = document.getElementById('CustomerPassword').value;
                        var confirmpass = document.getElementById('CustomerConfirmPassword').value;
                        if(pass == '' || confirmpass == ''){
                            result.style.color = "red";
                            document.getElementById("not_matched").innerHTML = "Password and Confirm Password are not matched!";
                            submit.disabled = true;
                        }
                        else if(pass!=confirmpass){
                            result.style.color = "red";
                            document.getElementById("not_matched").innerHTML = "Password and Confirm Password are not matched!";
                            submit.disabled = true;
                        }
                        else if(pass==confirmpass){
                            result.style.color = "green";
                            document.getElementById("not_matched").innerHTML = "Password and Confirm Password are matched!";
                            submit.disabled = false;
                        }
                    }

                    function clearValidate(){   
                        var result = document.getElementById("not_matched");
                        var submit = document.getElementById("createAccountButton");                     
                        result.innerHTML = '';
                        submit.disabled = false;                        
                    }

                    function onlyNumberKey(evt) {           
                        // Only ASCII charactar in that range allowed 
                        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
                        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                            return false; 
                        return true; 
                    }   
                </script>           
            </div>
        </div>
    </div>
</body>
</html>
