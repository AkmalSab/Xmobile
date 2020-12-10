<?php 
include '../phpFunction.php';
startSession();
$conn = dbConfig();
//echo $_SESSION['custId'];
$custId = $_SESSION['custId'];
//echo $_SESSION['custUsername']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!--basic template-->
  <meta charset="UTF-8">
  <meta name="Description" content="Workshop 2 UTeM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Xmobile Online Gadget Store</title>

  <!-- muaadh edit --> 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <link href="../cssmuaadh/bootstrap.min.css" rel="stylesheet">
  <link href="../cssmuaadh/slick.css" rel="stylesheet">
  <link href="../cssmuaadh/slick-theme.css" rel="stylesheet">
  <link href="../cssmuaadh/nouislider.min.css" rel="stylesheet">
  <link href="../cssmuaadh/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../cssmuaadh/style.css"/>
  <link rel="stylesheet" href="../cssmuaadh/home.scss"/>
  <link rel="stylesheet" href="../css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="../cssmuaadh/categories.scss"/>

  <!-- akmalsab edit -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<!-- MAIN HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row align-items-center mx-auto">
        <!-- LOGO -->
            <div class="col center-block text-center">
                <div class="header-logo">
                    <a routerLink="/" class="logo">
                    <img class="img-responsive center-block d-block mx-auto" src="../img/logo.png" alt="company logo" width="100" height="100">
                    </a>
                </div>
                    <h1 style="color: white;">Welcome, to Xmobile</h1>
            </div>
        <!-- /LOGO -->                    
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- /MAIN HEADER -->
<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="../index.php">Xmobile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="categories.php">Categories<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orders.php">Cart<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if(isset($_SESSION['custEmail'])){
            echo '<li class="nav-item"><a class="nav-link" href="userProfile.php">'.$_SESSION['custEmail'].'</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="logOut.php">Log Out</a></li>';
            }
            else{
            echo '<li class="nav-item"><a class="nav-link" href="login.html">LogIn</a></li>
            <li class="nav-item"><a class="nav-link" href="registration.html">SignUp</a></li>';
            }    
            ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Recent Purchases</a>
                <a class="dropdown-item" href="#">Coupon</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">My Wishlist<i class="fa fa-cart-plus"></i></a>
            </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>        
        </form>
    </div>
</nav>
<!-- /NAVIGATION -->
<!--End header -->
    <br>
    <div class="row center mx-auto">
        <div class="col">
            <h3 class="center mx-auto">Profile</h3>    
        </div>
        <div class="col">        
            <?php echo '<a type="button" class="btn btn-primary float-right" href="updateProfile.php?u='.$custId.'">Update Profile</a>' ?>         
        </div>                
    </div>
    <div class="row center mx-auto table-responsive">
        <div class="col">                    
            <table class="table table-hover table-bordered table-sm">
                <caption>Account Details</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th> 
                        <th>Status</th>      
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //create sql query
                        $selectQuery = mysqli_prepare($conn, "SELECT CUSTOMER_ID, CUSTOMER_NAME, CUSTOMER_USERNAME, CUSTOMER_EMAIL, CUSTOMER_PHONE, CUSTOMER_STATUS FROM CUSTOMER WHERE CUSTOMER_USERNAME = ?;");

                        // bind parameters for makers
                        mysqli_stmt_bind_param($selectQuery, "s", $_SESSION['custUsername']);

                        // execute prepared statement
                        mysqli_stmt_execute($selectQuery);

                        // bind result variables
                        mysqli_stmt_bind_result($selectQuery, $ID, $NAME, $USERNAME, $EMAIL, $PHONE, $STATUS);

                        // fetch value
                        if(mysqli_stmt_fetch($selectQuery)){
                            echo '                            
                            <td>'.$NAME.'</td>                          
                            <td>'.$USERNAME.'</td>
                            <td>'.$EMAIL.'</td>                 
                            <td>'.$PHONE.'</td>                  
                            <td>'.$STATUS.'</td>';
                        }
                        // close statement
                        mysqli_stmt_close($selectQuery);
                    ?>                                     
                </tbody>
            </table>                  
        </div>
    </div>
    <div class="row center mx-auto">
        <div class="col">
            <h3 class="center mx-auto">Address</h3>             
        </div>
        <div class="col">
            <?php echo '<a type="button" class="btn btn-primary float-right" href="addAddress.php?u='.$custId.'">Add New Address</a>' ?>         
        </div>
    </div>     
        <div class="row center mx-auto table-responsive">
            <div class="col">     
                <table class="table table-hover table-bordered table-sm">
                    <caption>Address Details</caption>
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Full Address</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Province</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        //create sql query
                        $selectQuery2 = mysqli_prepare($conn, "SELECT ADDRESS_ID, FULL_ADDRESS, ADDRESS_POSTCODE, ADDRESS_PROVINCE, ADDRESS_STATUS FROM CUSTOMER_ADDRESS WHERE ADDRESS_STATUS = 'AVAILABLE' AND CUSTOMER_ID = ?;");

                        // bind parameters for makers
                        mysqli_stmt_bind_param($selectQuery2, "s", $_SESSION['custId']);+

                        // execute prepared statement
                        mysqli_stmt_execute($selectQuery2);
                        
                        // bind result variables
                        mysqli_stmt_bind_result($selectQuery2, $ADDRESSID, $FULLADDRESS, $POSTCODE, $PROVINCE, $ADDRESSSTATUS);

                        $i = 1;

                        // fetch value
                        while(mysqli_stmt_fetch($selectQuery2)){                
                            echo '<tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$FULLADDRESS.'</td>
                            <td>'.$POSTCODE.'</td>                
                            <td>'.$PROVINCE.'</td>
                            <td>
                            <a type="button" class="btn btn-danger" href="deleteAddress.php?aid='.$ADDRESSID.'">Delete</a>
                            </td>';
                            $i++;
                        }
                        // close statement
                        mysqli_stmt_close($selectQuery2);

                        // close connection 
                        mysqli_close($conn);                           
                        ?>                                                             
                    </tbody>
                </table>                               
            </div>
        </div>
    </div>
</body>        
</html>