<?php


if(isset($_POST['addNewAddress'])){

    //echo $_GET["u"];    

    //include database connection file
    include '../phpFunction.php';

    //return connection
    $conn = dbConfig();
    $status = 'AVAILABLE';

    //retrieve user's input from html form
    $CustomerAddress = mysqli_real_escape_string($conn,$_POST['CustomerAddress']);
    $CustomerProvince = mysqli_real_escape_string($conn,$_POST['CustomerProvince']);
    $CustomerPostcode = mysqli_real_escape_string($conn,$_POST['CustomerPostcode']);

    // create a prepared statement 
    $insertQuery = mysqli_prepare($conn, "INSERT INTO CUSTOMER_ADDRESS (CUSTOMER_ID, FULL_ADDRESS, ADDRESS_POSTCODE, ADDRESS_PROVINCE, ADDRESS_STATUS) VALUES (?,?,?,?,?);");

    // bind parameters for makers
    mysqli_stmt_bind_param($insertQuery, "sssss", $_GET["u"],$CustomerAddress,$CustomerPostcode,$CustomerProvince,$status);

    // execute prepared statement
    if(mysqli_stmt_execute($insertQuery)){
        echo '<script type="text/javascript">
        alert("New address has been added")
        </script>';    
        echo '<script type="text/javascript">location.href = "userProfile.php";</script>';
    }
    else
    {
        echo '<div class="alert alert-danger">
        <strong>Failed!</strong> New address is not been added.
        </div>';
    }
    
    // close statement
    mysqli_stmt_close($insertQuery);

    // close connection
    mysqli_close($conn);               
      
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
  <title>Add Address</title>

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
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <img src="../img/logo.png" alt="companyLogo" width="250" height="250">
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <p class="h1 d-none d-sm-none d-md-block d-lg-block d-xl-block">Add New Address</p>
                <p class="h3 d-sm-block d-md-none d-lg-none d-xl-none">Add New Address</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col align-items-center justify-content-center">
                <form action="#" method="POST" class="needs-validation" novalidate>                                              
                    <div class="form-group">
                        <label for="CustomerAddress">Address:</label>
                        <textarea name="CustomerAddress" class="form-control" id="CustomerAddress" rows="5" cols="50" required placeholder="Enter your Address"></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide your address!
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="CustomerProvince">Province:</label>
                                <select class="form-control" id="CustomerProvince" name="CustomerProvince" required>
                                <option value=""></option>
                                <option value="WILAYAH PERSEKUTUAN KUALA LUMPUR">WILAYAH PERSEKUTUAN KUALA LUMPUR</option>
                                <option value="WILAYAH PERSEKUTUAN PUTRAJAYA">WILAYAH PERSEKUTUAN PUTRAJAYA</option>
                                <option value="WILAYAH PERSEKUTUAN LABUAN">WILAYAH PERSEKUTUAN LABUAN</option>
                                <option value="SELANGOR">SELANGOR</option>
                                <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                                <option value="MELAKA">MELAKA</option>
                                <option value="JOHOR">JOHOR</option>
                                <option value="KEDAH">KEDAH</option>
                                <option value="PULAU PINANG">PULAU PINANG</option>
                                <option value="PERAK">PERAK</option>
                                <option value="PERLIS">PERLIS</option>
                                <option value="KELANTAN">KELANTAN</option>
                                <option value="PAHANG">PAHANG</option>
                                <option value="TERENGGANU">TERENGGANU</option>
                                <option value="SABAH">SABAH</option>
                                <option value="SARAWAK">SARAWAK</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose your province!
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="CustomerPostcode">Postcode:</label>
                                <input id="CustomerPostcode" name="CustomerPostcode" type="text" class="form-control" required onkeypress="return onlyNumberKey(event)" placeholder="Enter your Postcode e.g. 56000" maxlength="5" minlength="5">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please provide your postcode!
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <input type="submit" class="btn btn-primary btn-block" name="addNewAddress" value="Add">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <input type="reset" class="btn btn-secondary btn-block" value="Reset">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signUp" class="align-content-end"><a href="userProfile.php"><u>Go Back</u></a></label>
                    </div>
                </form>                  
            </div>
        </div>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function(){
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
                    

        function onlyNumberKey(evt) {
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
            
            return true; 
        }    
                        
    </script>
</body>        
</html>
