<?php
include '../phpFunction.php';
startSession();
//echo $_GET['q'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="Description" content="Workshop 2 UTeM">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=6">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product</title>
  <!-- Google font -->
  <link href="../fontAwesome/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
  <link href="../cssmuaadh/bootstrap.min.css" rel="stylesheet">
  <link href="../cssmuaadh/slick.css" rel="stylesheet">
  <link href="../cssmuaadh/slick-theme.css" rel="stylesheet">
  <link href="../cssmuaadh/nouislider.min.css" rel="stylesheet">
  <link href="../cssmuaadh/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../cssmuaadh/style.css"/>
  <link rel="stylesheet" href="../cssmuaadh/home.scss"/>
  <link rel="stylesheet" href="../css/owl.carousel.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<br>
<?php
  if($_GET['q'] == 1 || $_GET['q'] == "Huawei" || $_GET['q'] == "huawei"){
    echo '<div class="row justify-content-center">
      <div class="brand justify-content-center">
      <a href="#"><img class="brandd" src="../img/apple_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/samsung_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/Realme_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/vivo_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/Oppo_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/MIONE_brand.jpg"></a>
      <a href="#"> <img class="brandd" src="../img/Nokia_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/honner_brand.jpg"></a>
      <a href="#"><img class="brandd" src="../img/tecno_brand.jpg"></a>
      </div>
    </div>';      
  }      
?>  
  <div class="row justify-content-center" style="cursor: pointer;">
    <div class="column">
        <div class="card">
            <img src="../img/huawei-y5p-kv.jpg" alt="Jane" style="width:100%" height="300px">
            <div class="container">
                <h2>Huawei</h2>
                <p class="title"></p>
                <p>Some text that describes me lorem.</p>
                <p></p>
                <p><a href="products.php?q=Huawei"><button class="btnn">View Products</button></a></p>
            </div>
        </div>
    </div>    
    <div class="column">
        <div class="card">
            <a href="#"><img src="../img/samsung.jpg" alt="Mike" style="width:100%" height="300px"></a>
            <div class="container">
                <h2>Samsung</h2>
                <p class="title"></p>
                <p>Some text that describes me lorem.</p>
                <p></p>
                <p><a href="products.php?q=Samsung"><button class="btnn">View Product</button></a></p>
            </div>
        </div>
    </div>    
    <div class="column">
        <div class="card">
            <img src="../img/iphone.jpg" alt="John" style="width:100%" height="300px">
            <div class="container">
                <h2>Apple</h2>
                <p class="title"></p>
                <p>Some text that describes me lorem.</p>
                <p></p>
                <p><a href="products.php?q=Apple"><button class="btnn">View Product</button></a></p>
            </div>
        </div>
    </div>    
    <div class="column">
        <div class="card">
            <img class="efect-product" src="../img/vivo.jpg" alt="John" style="width:100%" height="300px">
            <div class="container">
                <h2>Vivo</h2>
                <p class="title"></p>
                <p>Some text that describes me lorem.</p>
                <p></p>
                <p><a href="products.php?q=Vivo"><button class="btnn">View Product</button></a></p>
            </div>
        </div>
    </div>    
    <div class="row justify-content-center" style="cursor: pointer;">
        <div class="column">
            <div class="card">
                <img src="../img/Lenovo.jpg" alt="John" style="width:100%;" height="300px">
                <div class="container">
                    <h2>Lenovo</h2>
                    <p class="title"></p>
                    <p>Some text that describes me lorem.</p>
                    <p></p>
                    <p><a href="products.php?q=Lenovo"><button class="btnn">View Product</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
          <div class="card">
              <img src="../img/nokia.jpg" alt="John" style="width:100%;" height="300px">
              <div class="container">
                  <h2>Nokia</h2>
                  <p class="title"></p>
                  <p>Some text that describes me lorem.</p>
                  <p></p>
                  <p><a href="products.php?q=Nokia"><button class="btnn">View Product</button></a></p>
              </div>
          </div>
      </div>
        <div class="column">
          <div class="card">
              <img src="../img/realmep.jpg" alt="John" style="width:100%;" height="300px">
              <div class="container">
                  <h2>Realme</h2>
                  <p class="title"></p>
                  <p>Some text that describes me lorem.</p>
                  <p></p>
                  <p><a href="products.php?q=Realme"><button class="btnn">View Product</button></a></p>
              </div>
          </div>
      </div>
      <div class="column">
          <div class="card">
              <img src="../img/oppo.jfif" alt="John" style="width:100%;" height="300px">
              <div class="container">
                  <h2>Oppo</h2>
                  <p class="title"></p>
                  <p>Some text that describes me lorem.</p>
                  <p></p>
                  <p><a href="products.php?q=Oppo"><button class="btnn">View Product</button></a></p>
              </div>
          </div>
      </div>
    </div>                        
  </div>


  <?php
      if($_GET['q'] == "Huawei" || $_GET['q'] == "huawei"){
        echo '<br>
        <h1 class="center-block text-center">'.$_GET['q'].'</h1>
        <div class="row justify-content-center" style="cursor: pointer;">
        <div class="column">
            <div class="card">
                <img src="../img/nova7.png" alt="Jane" style="width:100%">
                <div class="container">
                    <p>HUAWEI Y9 Prime Dual SIM Emerald Green 4GB RAM...</p>
                    <p class="title"></p>
                    <h2 style="font-size: 13px; font-weight: bold;">2910RM</2h>
                    <p></p>
                    <p><a href="#"><button class="btnn">View Products</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
          <div class="card">
              <img src="../img/p40.png" alt="Jane" style="width:100%">
              <div class="container">
                  <p>HUAWEI Y9 Prime Dual SIM Emerald Green 4GB RAM...</p>
                  <p class="title"></p>
                  <h2 style="font-size: 13px; font-weight: bold;">2910RM</2h>
                  <p></p>
                  <p><a href="#"><button class="btnn">View Products</button></a></p>
              </div>
          </div>
      </div>
        <div class="column">
            <div class="card">
                <a href="#"><img src="../img/y5p.png" alt="Mike" style="width:100%"></a>
                <div class="container">
                    <p>HUAWEI Y9 Prime Dual SIM Emerald Green 4GB RAM...</p>
                    <p class="title"></p>
                    <h2 style="font-size: 13px; font-weight: bold;">2910RM</2h>
                    <p></p>
                    <p><a href="#"><button class="btnn">View Product</button></a></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="../img/nova7i.png" alt="John" style="width:100%">
                <div class="container">
                    <p>huaweiP30 Pro white Dual SIM Emerald Green 4GB RAM...</p>
                    <p class="title"></p>
                    <h2 style="font-size: 13px; font-weight: bold;">1210RM</2h>
                    <p></p>
                    <p><a href="#"><button class="btnn">View Product</button></a></p>
                </div>
            </div>
        </div>';      
      }
  ?>
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
</body>
</html>