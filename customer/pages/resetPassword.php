<?php

if(isset($_POST['updateButton'])){

    //echo $_GET["e"];
    //echo $_GET["u"];

    //include database connection file
    include '../phpFunction.php';

    //return connection
    $conn = dbConfig();

    //retrieve user's input from html form
    $newPassword = mysqli_real_escape_string($conn,md5($_POST['newpassword']));
    $newConfirmPassword = mysqli_real_escape_string($conn,md5($_POST['confirmnewpassword']));

    if($newPassword == $newConfirmPassword){
        //create sql query
        $updateQuery = mysqli_prepare($conn, "UPDATE CUSTOMER SET CUSTOMER_PASSWORD = ? WHERE CUSTOMER_EMAIL = ? AND CUSTOMER_USERNAME = ?;");

        // bind parameters for makers
        mysqli_stmt_bind_param($updateQuery, "sss", $newPassword, $_GET["e"], $_GET["u"]);

        // execute prepared statement
        if(mysqli_stmt_execute($updateQuery)){
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Your password has been reset. Please login with your new password <a href="../index.html" class="alert-link">here</a>.
            </div>';
        }
        else{
            echo '<div class="alert alert-danger">
            <strong>Failed!</strong> New password is not match with Confirm Password.
            </div>';
        }        
    }
    else
    {
        echo '<div class="alert alert-danger">
        <strong>Failed!</strong> New password is not match with Confirm Password.
        </div>';
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--basic template-->
        <meta charset="utf-8">
        <meta name="Description" content="Workshop 2 UTeM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create new Password</title>
        
        <!--declaration for css & js-->
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
        

        <!-- PWA's setting -->
        <link rel="apple-touch-icon" href="/icons/icon-96x96png">
        <meta name="apple-mobile-web-app-status-bar" content="#aa7700"> <!--setting for IOS status bar devices-->
        <meta name="theme-color" content="#FFE1C4">
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img src="../img/logo.png" alt="companyLogo" width="250" height="250">
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <p class="h1 d-none d-sm-none d-md-block d-lg-block d-xl-block">Create new Password</p>
                <p class="h3 d-sm-block d-md-none d-lg-none d-xl-none">Create new Password</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col align-items-center justify-content-center">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input id="newPassword" type="password" class="form-control" name="newpassword" required autofocus="on" placeholder="insert your new password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <input id="confirmPassword" type="password" class="form-control" name="confirmnewpassword" required autofocus="on" placeholder="insert your confirm password">
                    </div>
                    <div class="form-group">
                        <label for="forgotPassword" class="align-content-start"><a href="../index.html">Back to home?</a></label>                            
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 col-xl-6">                                
                                <input type="submit" name="updateButton" value="Update" class="btn btn-primary btn-block"/>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-12 col-lg-6 col-xl-6">
                                <input type="reset" value="Reset" class="btn btn-secondary btn-block"/>
                            </div>
                        </div>
                    </div>                   
                </form>                  
            </div>
        </div>
    </div>
</body>        
</html>
