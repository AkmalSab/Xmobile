<?php
include '../phpFunction.php';
startSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!--basic template-->
  <meta charset="UTF-8">
  <meta name="Description" content="Workshop 2 UTeM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Categories</title>

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

    <!--start Catogeries -->
    <h1 class="text-center">Categories</h1>
    <br>
    <div class="row justify-content-center" style="cursor: pointer;">
        <div class="column">
            <div class="card">
                <img src="../img/Smartphone.png" alt="Phone" style="width:100%" height="300px">
                <div class="container">
                    <h2>Smart Phone</h2>
                    <p class="title"></p>
                    <p>Various well-know brand</p>
                    <p></p>
                    <p><a href="products.php?q=1"><button class="btnn">View More</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <a href="#"><img src="../img/charger.png" alt="charger" style="width:100%" height="300px"></a>
                <div class="container">
                    <h2>Charger</h2>
                    <p class="title"></p>
                    <p>Smart phone charges.</p>
                    <p></p>
                    <p><a href="products.php?q=2"><button class="btnn">View More</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="../img/cable.png" alt="cable" style="width:100%" height="300px">
                <div class="container">
                    <h2>Cable & Chargers</h2>
                    <p class="title"></p>
                    <p>Cable & Chargers</p>
                    <p></p>
                    <p><a href="products.php?q=3"><button class="btnn">View More</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img class="efect-product" src="../img/case.png" alt="Cases & Cover" style="width:100%" height="300px">
                <div class="container">
                    <h2>Cases & Cover</h2>
                    <p class="title"></p>
                    <p>Cases & Cover</p>
                    <p></p>
                    <p><a href="products.php?q=4"><button class="btnn">View More</button></a></p>
                </div>
            </div>
        </div>            
    </div>
    <div class="row justify-content-center" style="cursor: pointer;">
        <div class="column">
        <div class="card">
            <img src="../img/screenprotector.png" alt="Screen Protectors" style="width:100%;" height="300px">
            <div class="container">
                <h2>Screen Protectors</h2>
                <p class="title"></p>
                <p>Screen Protectors</p>
                <p></p>
                <p><a href="products.php?q=5"><button class="btnn">View More</button></a></p>
            </div>
        </div>                  
        </div>
        <div class="column">
        <div class="card">
            <img src="../img/storage.png" alt="storage" style="width:100%;" height="300px">
            <div class="container">
                <h2>storage</h2>
                <p class="title"></p>
                <p>storage</p>
                <p></p>
                <p><a href="products.php?q=6"><button class="btnn">View More</button></a></p>
            </div>
        </div>                  
        </div>
        <div class="column">
        <div class="card">
            <img src="../img/powerbank.png" alt="Powerbank" style="width:100%;" height="300px">
            <div class="container">
                <h2>Powerbank</h2>
                <p class="title"></p>
                <p>Powerbank</p>
                <p></p>
                <p><a href="products.php?q=7"><button class="btnn">View More</button></a></p>
            </div>
        </div>                  
        </div>          
    </div>           

    <!-- End Categories-->
        <br>
        <br>
        <br>
    <!--Start Footer-->
    <footer>
        <div class="main-contact" style="background: #15161D;">
            <div class="left box">
                <h2>About Us</h2>
                <div class="content">
                    <p style="word-wrap: break-word">
                    Xmobile is a local gadget shop located in Ayer Keroh Melaka, we do sells smartphones from various well-know brand like Samsung, Apple, Oppo and others. You also can find mobile accessories here. Come and visit us today!
                    Don't forget to follow our social media account too!!
                    </p>
                    <div class="social">
                        <a href="#"><span class="fab fa-facebook"></span></a>
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-instagram"></span></a>
                    </div>
                </div>
            </div>
            <div class="center box">
                <h2>Address</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Xmobile, Ayer Keroh, Melaka</span>
                    </div>
                    <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+60-1120-624714</span>
                    </div>
                    <div class="Email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">Xmobile-marketing@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="right box">
                <h2>Contact Us</h2>
                <div class="content">
                    <form action="#">
                        <div class="Email">
                            <div class="text">Email *</div>
                            <input type="email" required autocomplete="off">
                        </div>
                        <div class="msg">
                            <div class="text">Message *</div>
                            <textarea required></textarea>
                        </div>
                        <div class="btn-footer">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bottom">
            <center>
                <span class="credit">
                Created By 
                <a href="#">Xmobile Sdn Bhd</a>
                | 
                <i class="far fa-copyright fa-sm"></i>
                2020 All Right Reserved.
                </span>
                

                </span>
            </center>
        </div>
    </footer>
    <!--End Footer-->

    <!--Start Scroll to top-->
    <button id="topBottn">
        <i class="fas fa-angle-up"></i>
    </button>
    <!--End Scroll to top-->
<script type="text/javascript" src="jsmuaadh/AllFunc.js"></script>
</body>
</html>