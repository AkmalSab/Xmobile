<?php
include '../phpFunction.php';
startSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="Description" content="Workshop 2 UTeM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cart</title>

  <!-- Google font -->    
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
  <link href="fontAwesome/css/all.css" rel="stylesheet">
  <link href="../cssmuaadh/slick.css" rel="stylesheet">
  <link href="../cssmuaadh/slick-theme.css" rel="stylesheet">
  <link href="../cssmuaadh/nouislider.min.css" rel="stylesheet">
  <link href="../cssmuaadh/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../cssmuaadh/style.css"/>
  <link rel="stylesheet" href="../cssmuaadh/home.scss" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- akmalsab edit -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<!--start header -->
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

<!--Start Order -->
<h1 class="text-center" style="color: black;">Shopping Cart</h1>
<br>
<?php
    if(isset($_SESSION['custEmail'])){
        echo '<div class="container mb-4">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"> </th>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col" class="text-center">QUANTITY</th>
                    <!-- <th scope="col" class="text-center">COMMENT</th> -->
                    <th scope="col" class="text-right">TOTAL</th>
                    <th scope="col" class="text-right">REMOVE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src="../img/huawei-y5p-kv.jpg" style="max-height: 70px;" /> </td>
                    <td>Huawei A98</td>
                    <td>RM122</td>
                    <td><input type="number" class="form-control text-center" style="width: 65px; margin-left: 126px;" value="1"></td>
                    <!-- <td class="text-right">the new</td> -->
                    <td class="text-right">RM122</td>
                    <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                  </tr>           
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-Total</td>
                    <td class="text-right">255,90 €</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Shipping</td>
                    <td class="text-right">6,90 €</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td class="text-right"><strong>RM122</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col mb-2">
            <div class="row mt-4 d-flex align-items-center">
              <div class="col-sm-6 order-md-2 text-right">
                <a href="#" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
              </div>
              <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="../index.php">
                  <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
              </div>
            </div>
          </div>
        </div>
      </div>';
    }
    else{
        echo '<p class="text-center" style="color: red;">Plese sign in first</p>';
    } 
?>
<!--End Order -->
</body>
</html>