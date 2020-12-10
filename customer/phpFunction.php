<?php

function dbConfig(){
    $dbname = "Xmobile";
    $host = "localhost";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($host, $user, $pass, $dbname) or die('Database connection failed!');

   if($conn)
        //echo 'Database connection is working!';

    return $conn;
}

function startSession(){
    // Start the session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function endSession(){
    if (session_status() == PHP_SESSION_ACTIVE) {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
    }    
}

?>