<?php

//include database connection file
include 'phpFunction.php';

$conn = dbConfig();

//retrieve user's input from html form
$username = mysqli_real_escape_string($conn,md5($_POST['username']));
$password = mysqli_real_escape_string($conn,md5($_POST['password']));

//print user's input
//echo 'username -> '.$username.'<br>';
//echo 'password -> '.$password.'<br>';
//$selectQuery = mysqli_prepare($conn, "SELECT * FROM CUSTOMER WHERE CUSTOMER_USERNAME = '".$username."' AND CUSTOMER_PASSWORD = '".$password."';");


//create sql query
$selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_EMAIL FROM CUSTOMER WHERE CUSTOMER_USERNAME = ? AND CUSTOMER_PASSWORD = ?;");

// bind parameters for makers
mysqli_stmt_bind_param($selectQuery, "ss", $username,$password);

// execute prepared statement
mysqli_stmt_execute($selectQuery);

// bind result variables
mysqli_stmt_bind_result($selectQuery, $id, $name, $user, $pass, $emel);

// fetch value
if(mysqli_stmt_fetch($selectQuery)){
    echo '<script type="text/javascript">
         alert("Welcome back '.$name.' !")
         </script>';
         startSession();
         $_SESSION['custId'] = $id;
         $_SESSION['custName'] = $name;
         $_SESSION['custUsername'] = $username;
         $_SESSION['custEmail'] = $emel;        
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}
else{
    echo '<script type="text/javascript">
        alert("Username or Password may be wrong!")
        </script>';    
    echo '<script type="text/javascript">location.href = "index.php";</script>';
}

// close statement
mysqli_stmt_close($selectQuery);

// close connection 
mysqli_close($conn);

?>