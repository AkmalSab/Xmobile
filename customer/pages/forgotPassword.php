<?php

//include database connection file
include '../phpFunction.php';

//return connection
$conn = dbConfig();

//retrieve user's input from html form
$receiveEmail = mysqli_real_escape_string($conn,$_POST['email']);

//create sql query
$selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_USERNAME, CUSTOMER_EMAIL FROM CUSTOMER WHERE CUSTOMER_EMAIL = ?;");

// bind parameters for makers
mysqli_stmt_bind_param($selectQuery, "s", $receiveEmail);

// execute prepared statement
mysqli_stmt_execute($selectQuery);

// bind result variables
mysqli_stmt_bind_result($selectQuery, $selectedUserName, $selectedEmail);

mysqli_stmt_fetch($selectQuery);

// fetch value
if($selectedEmail == $receiveEmail){    

    $body = [
        'Messages' => [
            [
            'From' => [
                'Email' => "akmalsab14@gmail.com",
                'Name' => "Xmobile Customer Services"
            ],
            'To' => [
                [
                'Email' => "$receiveEmail",
                'Name' => "$selectedUserName"
                ]
            ],
            'Subject' => "RESET PASSWORD REQUEST",
            'HTMLPart' => "<h3>Dear User, please click link below to reset your new password http://localhost/Xmobile/customer/pages/resetPassword.php?e=".$selectedEmail."&u=".$selectedUserName.""
            ]
        ]
    ];
     
    $ch = curl_init();
     
    curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json')
    );
    curl_setopt($ch, CURLOPT_USERPWD, "75911ebd394889f841d28da610c33ff0:c43a3c3e670760fcd9de37f93e7827aa");
    $server_output = curl_exec($ch);
    curl_close ($ch);
     
    $response = json_decode($server_output);
    if ($response->Messages[0]->Status == 'success') {
        include 'emailSentSuccess.html';
    } 
    else
    {
        include 'emailSentFail.html';
    }
}
else
{    
    include 'emailSentFail.html';
}

// close statement
mysqli_stmt_close($selectQuery);

// close connection 
mysqli_close($conn);
?>