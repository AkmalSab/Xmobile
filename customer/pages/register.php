<?php
include '../phpFunction.php';
$conn = dbConfig();

$status = 'AVAILABLE';
$CustomerUsername = mysqli_real_escape_string($conn,md5($_POST['CustomerUsername']));
$CustomerName = mysqli_real_escape_string($conn,$_POST['CustomerName']);
$CustomerEmail = mysqli_real_escape_string($conn,$_POST['CustomerEmail']);
$CustomerPhoneNo = mysqli_real_escape_string($conn,$_POST['CustomerPhoneNo']);
$CustomerAddress = mysqli_real_escape_string($conn,$_POST['CustomerAddress']);
$CustomerProvince = mysqli_real_escape_string($conn,$_POST['CustomerProvince']);
$CustomerPostcode = mysqli_real_escape_string($conn,$_POST['CustomerPostcode']);
$CustomerPassword = mysqli_real_escape_string($conn,md5($_POST['CustomerPassword']));
$CustomerConfirmPassword = mysqli_real_escape_string($conn,md5($_POST['CustomerConfirmPassword']));

// echo $CustomerUsername;
// echo '<br>';
// echo $CustomerName;
// echo '<br>';
// echo $CustomerEmail;
// echo '<br>';
// echo $CustomerPhoneNo;
// echo '<br>';
// echo $CustomerAddress;
// echo '<br>';
// echo $CustomerProvince;
// echo '<br>';
// echo $CustomerPostcode;
// echo '<br>';
// echo $CustomerPassword;
// echo '<br>';
// echo $CustomerConfirmPassword;
// echo '<br>';

//create sql query
$selectExistCustomer = mysqli_prepare($conn, "SELECT CUSTOMER_USERNAME, CUSTOMER_EMAIL, CUSTOMER_PHONE FROM CUSTOMER;");

// execute prepared statement
mysqli_stmt_execute($selectExistCustomer);

// bind result variables
mysqli_stmt_bind_result($selectExistCustomer, $custUsername, $custEmail, $custPhone);

// fetch value
while(mysqli_stmt_fetch($selectExistCustomer)){
    // echo $custUsername.'<br>';
    // echo $custEmail.'<br>';
    // echo $custPhone.'<br>';

    if ($CustomerUsername == $custUsername){
        // close statement
        mysqli_stmt_close($selectExistCustomer);
        // close connection 
        mysqli_close($conn);

        echo '<script type="text/javascript">
        alert("Username already exist!")
        </script>';    
        echo '<script type="text/javascript">location.href = "registration.html";</script>';
        exit();

    }     
    else if ($CustomerEmail == $custEmail){
        // close statement
        mysqli_stmt_close($selectExistCustomer);
        // close connection 
        mysqli_close($conn);

        echo '<script type="text/javascript">
        alert("Email already exist!")
        </script>';    
        echo '<script type="text/javascript">location.href = "registration.html";</script>';
        exit();
    }
    else if ($CustomerPhoneNo == $custPhone){
        // close statement
        mysqli_stmt_close($selectExistCustomer);
        // close connection 
        mysqli_close($conn);

        echo '<script type="text/javascript">
        alert("Phone number already exist!")
        </script>';    
        echo '<script type="text/javascript">location.href = "registration.html";</script>';
        exit();
    }
}

if($CustomerPassword == $CustomerConfirmPassword){

    // create a prepared statement 
    $insertQuery = mysqli_prepare($conn, "INSERT INTO CUSTOMER (CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_PASSWORD, CUSTOMER_STATUS) VALUES (?,?,?,?,?,?);");

    // bind parameters for makers
    mysqli_stmt_bind_param($insertQuery, "ssssss", $CustomerName,$CustomerUsername,$CustomerEmail,$CustomerPhoneNo,$CustomerPassword,$status);

    // execute prepared statement
    mysqli_stmt_execute($insertQuery);

    // close statement
    mysqli_stmt_close($insertQuery);

    /* SELECT USER ID AND PASS TO INSERT INTO CUSTOMER_ADDRESS */
    $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS, CUSTOMER_USERNAME FROM CUSTOMER WHERE CUSTOMER_USERNAME = ? AND CUSTOMER_PASSWORD = ?;");

    mysqli_stmt_bind_param($selectQuery, "ss", $CustomerUsername, $CustomerPassword);

    mysqli_stmt_execute($selectQuery);

    //Binds variables to a prepared statement for result storage
    mysqli_stmt_bind_result($selectQuery, $var1, $var2, $var3, $var4, $var5, $var6);

    //Fetch results from a prepared statement into the bound variables
    mysqli_stmt_fetch($selectQuery);

    // close statement
    mysqli_stmt_close($selectQuery);

    //echo 'Fetched Customer_Id -> '.$var1.'<br> Fetched Password ->'.$var2.'<br>';

    /* INSERT INTO CUSTOMER_ADDRESS */
    // create a prepared statement 
    $insertQuery2 = mysqli_prepare($conn, "INSERT INTO CUSTOMER_ADDRESS (CUSTOMER_ID, FULL_ADDRESS, ADDRESS_POSTCODE, ADDRESS_PROVINCE, ADDRESS_STATUS) VALUES (?,?,?,?,?)");

    // bind parameters for makers
    mysqli_stmt_bind_param($insertQuery2, "sssss", $var1, $CustomerAddress, $CustomerPostcode, $CustomerProvince, $status);

    // execute prepared statement
    mysqli_stmt_execute($insertQuery2);

    // close statement 
    mysqli_stmt_close($insertQuery2);

    // close connection 
    mysqli_close($conn);    

    startSession();
    $_SESSION['custId'] = $var1;
    $_SESSION['custUsername'] = $var6;
    $_SESSION['custEmail'] = $var3;

    echo '<script type="text/javascript">
    alert("Welcome On board "'.$var2.'")
    </script>';   
    echo '<script type="text/javascript">location.href = "userProfile.php";</script>';
}
else{
    // close connection 
    mysqli_close($conn);
    
    echo '<script type="text/javascript">
    alert("Password and Confirm Password not matched!")
    </script>';    
    echo '<script type="text/javascript">location.href = "registration.html";</script>';
}    



?>