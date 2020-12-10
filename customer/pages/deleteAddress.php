<?php

include '../phpFunction.php';

$conn = dbConfig();

echo $_GET['aid'];
 
$updateQuery = "UPDATE CUSTOMER_ADDRESS SET ADDRESS_STATUS = 'UNAVAILABLE' WHERE ADDRESS_ID = ?";

$updateResult = mysqli_prepare($conn,$updateQuery);
 
mysqli_stmt_bind_param($updateResult, 's', $_GET['aid']);

mysqli_stmt_execute($updateResult);

echo '<script type="text/javascript">
        alert("Address has been deleted")
        </script>';    
echo '<script type="text/javascript">location.href = "userProfile.php";</script>';

?>