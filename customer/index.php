<?php
include 'phpFunction.php';
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
  <title>Xmobile Online Gadget Store</title>

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
              <img class="img-responsive center-block d-block mx-auto" src="img/logo.png" alt="company logo" width="100" height="100">
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
    <a class="navbar-brand" href="#">Xmobile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="pages/categories.php">Categories<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/orders.php">Cart<span class="sr-only">(current)</span></a>
        </li>
        <?php
            if(isset($_SESSION['custEmail'])){
                echo '<li class="nav-item"><a class="nav-link" href="pages/userProfile.php">'.$_SESSION['custEmail'].'</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="pages/logOut.php">Log Out</a></li>';
            }
            else{
                echo '<li class="nav-item"><a class="nav-link" href="pages/login.html">LogIn</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/registration.html">SignUp</a></li>';
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

  <!--start Slider -->
  <div class="row">
    <div class="col">
        <div class="slider">
          <div class="slide current">
          </div>
          <div class="slide"> 
          </div>
          <div class="slide">
          </div>
      </div>
    </div>
  </div>
  <div class="buttons">
      <button id="prev"><i class="fa fa-arrow-left"></i></button>
      <button id="next"><i class="fa fa-arrow-right"></i></button>
  </div>

  <script>
      const slides = document.querySelectorAll('.slide');
      const next = document.querySelector("#next");
      const prev = document.querySelector("#prev");
      const intervalTime = 5000;
      let slideInterval;

      next.addEventListener("click", e => {
          nextSlide();
          if (true) {
              clearInterval(slideInterval);
              slideInterval = setInterval(nextSlide, intervalTime);
          }
      })

      prev.addEventListener("click", e => {
          prevSlide();
          if (true) {
              clearInterval(slideInterval);
              slideInterval = setInterval(nextSlide, intervalTime);
          }
      })

      const nextSlide = () => {
          const current = document.querySelector(".current");
          current.classList.remove("current");
          if (current.nextElementSibling) {
              current.nextElementSibling.classList.add("current");
          } else {
              slides[0].classList.add('current');
          }
          setTimeout(() => current.classList.remove('current'));
      };

      const prevSlide = () => {
          const current = document.querySelector(".current");
          current.classList.remove("current");
          if (current.previousElementSibling) {
              current.previousElementSibling.classList.add("current");
          } else {
              slides[slides.length - 1].classList.add('current');
          }
          setTimeout(() => current.classList.remove('current'));
      };

      slideInterval = setInterval(nextSlide, intervalTime);
      
  </script>
  <!--End Slider -->

  <hr style="margin-top: -100px; color: #D5DBDB">  
        
  <!-- StartCategories--> 
  <div class="container">
      <div class="row justify-content-center">
        <div class="col center-block text-center">
            <h1>Categories</h1>
        </div>
      </div>

      <br>
      <!-- start row -->
      <div class="row">
        <div class="card-deck">
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/Smartphone.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Smart Phone</h5>
              <p class="card-text">Various well-know brand.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=1" class="btn btn-primary">View more</a>
            </div>
          </div>
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/charger.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Charger</h5>
              <p class="card-text">TSmart phone charges.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=2" class="btn btn-primary">View more</a>
            </div>
          </div>
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/cable.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Cable & Chargers</h5>
              <p class="card-text">Cable & Chargers.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=3" class="btn btn-primary">View more</a>
            </div>
          </div>
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/case.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Cases & Cover</h5>
              <p class="card-text">Cases & Cover</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=4" class="btn btn-primary">View more</a>
            </div>
          </div>
        </div>
        <!-- end of row -->
      </div>

      <!-- start row -->
      <div class="mt-5 row">
        <div class="card-deck">
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/screenprotector.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Screen Protectors</h5>
              <p class="card-text">Screen Protectors.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=5" class="btn btn-primary">View more</a>
            </div>
          </div>
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/storage.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Storage</h5>
              <p class="card-text">Storage.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=6" class="btn btn-primary">View more</a>
            </div>
          </div>
          <!-- product -->
          <div class="card">
            <img class="card-img-top img-fluid" src="img/powerbank.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Powerbank</h5>
              <p class="card-text">Powerbank.</p>
            </div>
            <div class="card-footer">
              <a href="pages/products.php?q=7" class="btn btn-primary">View more</a>
            </div>
          </div>        
        <!-- end of row -->
      </div>
    </div>  
  </div>
  <!-- End Categories-->

  <div class="container-fluid">

  </div>
  <br>
  <!-- Strat Footer btween Categories and New Product-->
  <section class="offer section">
      <div class="offer_bg">
          <div class="offer_data">
              <h2 class="offer_title">Register Now!</h2>
              <p class="offer_description">We Have New Products and High Quality</p>
          </div>
      </div>
  </section>
  <!-- End Footer btween Categories and New Product-->

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
      <i class="fas fa-angle-up fa-lg"></i>
  </button>
  <!--End Scroll to top-->

<script type="text/javascript" src="jsmuaadh/AllFunc.js"></script>
</body>
</html>