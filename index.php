<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1.0, width=device-width">
  <!-- <meta http-equiv="refresh" content="5"> -->
  <title>Parkplace Solution</title>

  <link rel="shortcut icon" type="image/x-icon" href="image/logo.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="css/tooplate-style.css"> <!-- Templatemo style -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.default.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="/fonts/webfontkit/stylesheet.css">
  <link href="css/select2.min.css" rel="stylesheet" />
  <script src="js/select2.min.js"></script>
  <!-- load JS files -->
  <script src="js/fontawesome95b99d7a50.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- https://popper.js.org/ -->
  <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
  <script src="js/owl.carousel.js"></script>
  <script src="js/index.js"></script>
  <script type="text/JavaScript" src="js/underscore-min.js"></script>

</head>

<body>

  <!-- Mobile navbar -->
  <div class="m-banner container">
    <div class="m-brand-container row unselectable">
      <section style="height:100%; width:100%; margin: 0 15px">
        <a class="m-brand col" href="">
          <img src="image/logo.png" height="30px" width="30px">
          Parkplace Solution
        </a>
        <i class="fa fa-bars m-nevigation"></i>
      </section>
    </div>
    <!-- <div class="m-search-box row d-none">
      <div class="m-search row">
        <div class="m-place-select col">
          <div class="m-select-box tm-bg-black-shadow">
            <i class="fa fa-sort-desc" aria-hidden="true"></i>
            <div class="m-selected unselectable">Barasat</div>
            <div class="m-option-box unselectable">
              <div class="m-options">Barasat</div>
              <div class="m-options">Kolkata</div>
              <div class="m-options">Barrakpore</div>
              <div class="m-options">4</div>
              <div class="m-options">5</div>
            </div>
          </div>
        </div>
        <input type="text" name="search" class="m-search-input tm-bg-black-shadow col" placeholder="Search a service">
      </div>
    </div>
    <div class="m-banner-msg row unselectable d-none">
      <button class="m-signin-btn">Sign In</button>
      <span class="m-user-welcome">Hello Saikat Dutta</span>
    </div> -->
  </div>

  <!-- Mobile Sidebar -->
  <div class="m-sidebar unselectable" id="mySidebar">
    <div class="m-sidebar-title">
      <a class="m-brand col" href="./">
        <img src="image/logo.png" height="30px" width="30px">
        Parkplace Solution
      </a>
      <h5>
        <a href="javascript:void(0)" class="m-closesidebar"><i class="fa fa-times"></i></a>
        <span class="m-sidebar-title-text"></span>
      </h5>
    </div>
    <div class="m-sidebar-content">
      <div class="m-sidebar-component">
        <a href="/">
          <h5 style="color: black;">
            Home
            <i class="fa fa-home" aria-hidden="true"></i>
          </h5>
        </a>
      </div>
      <div class="m-sidebar-component">
        <a href="./professional.php">
          <h5 style="color: black;">
            Become a professional
            <i class="fa fa-briefcase" aria-hidden="true"></i>
          </h5>
        </a>
      </div>
      <div class="m-sidebar-component">
        <a href="./blog.php">
          <h5 style="color: black;">
            Blog
            <i class="fa fa-rss" aria-hidden="true"></i>
          </h5>
        </a>
      </div>
      <div class="m-sidebar-component">
        <a href="#contact">
          <h5 style="color: black;">
            Contact Us
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </h5>
        </a>
      </div>
      <div class="m-sidebar-component">
        <a href="./user-logout.php">
          <h5 style="color: black;">
            Log Out
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </h5>
        </a>
      </div>
    </div>
  </div>

  <!-- carousel -->

  <div class="container banner-container">

    <!-- DEFAULT -->
    <div id="banner-carousel" class="owl-carousel banner-carousel owl-theme">
      <div class="item"><img src="image/umberto-jXd2FSvcRr8-unsplash.jpg" class="d-block w-100 max-height-515"></div>
      <div class="item"><img src="image/Digital-Marketing.jpg" class="d-block w-100 max-height-515"></div>
      <div class="item"><img src="image/Premises_Sanitization_eq57sj.jpg" class="d-block w-100 max-height-515"></div>
      <div class="item"><img src="image/joel-rohland-C1r9pODhfQ4-unsplash.jpg" class="d-block w-100 max-height-515"></div>
      <div class="item"><img src="image/emile-perron-xrVDYZRGdw4-unsplash.jpg" class="d-block w-100 max-height-515"></div>
    </div>

    <!-- MOBILE -->
    <div id="m-banner-carousel" style="z-index: 0;" class="owl-carousel m-banner-carousel owl-theme">
      <div class="item"><img src="image/m-umberto1.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/m-Digital-Marketing.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/joel-rohland-C1r9pODhfQ4-unsplash.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/m-digital_marketing1.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/nikolai-chernichenko.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/windows11.15.jpg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/Web-design.jpeg" class="d-block w-100 h-100 max-height-515"></div>
      <div class="item"><img src="image/m-christopher.jpg" class="d-block w-100 h-100 max-height-515"></div>
    </div>
  </div>

  <!-- Top navbar -->
  <div class="top-nav">
    <div class="container">
      <div class="nav-bar">
        <a class="navbar-brand" href="./">
          <img src="image/logo.png" height="30px" width="30px" style="border-radius: 10px;">
          Parkplace Solution
        </a>
        <div class="search-box col justify-content-center" style="background-color: white;">

          <div class="input-group mb-3" style="height: 100%;">
            <div class="input-group-prepend h-100" style="font-size: 13px; margin-top: 1px;">
              <select class="form-select form-select-sm Address-selecter" aria-label=".form-select-sm" placeholder="Search for a service..." style="padding-right: 25px; padding-left: 8px; text-align: center;">
                <?php
                $address = mysqli_query($conn, "SELECT * FROM `city`;");
                $first = true;
                while ($row = mysqli_fetch_assoc($address)) {
                  if ($first) {

                ?>
                    <option value="<?php echo $row['city']; ?>" selected><?php echo $row['city']; ?></option>
                  <?php
                    $first = false;
                  } else {
                  ?>
                    <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </div>
            <input type="text" id="search-input" class="form-control search-input" aria-label="Text input with dropdown button">
          </div>
        </div>
        <div class="right-nav-item">
          <div class="dropdown">
            <button class="dropdown-button">
              More
              <i class="fa fa-sort-desc"></i>
              <i class="fa fa-sort-asc"></i>
            </button>
            <div class="dropdown-content" id="dropdown-content">
              <a href="logout.php">Home</a>
              <a class="more-join-us" href="user-login.php">Join Us</a>
              <a href="seller-account-info.php">Blog</a>
              <a href="login-info.php">Contact us</a>
              <a href="seller-info.php">Log out</a>
            </div>
          </div>
          <a class="join-us" href="./professional.php">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            Join Us
          </a>
          <a class="" href="./products.php">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Products
          </a>
          <a class="signup" href="./user-login.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            Log In
          </a>

        </div>
      </div>
    </div>
  </div>

  <!-- top nav 2 -->
  <div class="top-nav-2">
    <a class="navbar-brand-2" href="./">
      <img src="image/logo.png" height="30px" width="30px" style="border-radius: 10px;">
      Parkplace Solution
    </a>
    <div class="search-box-2 d-none">
      <form class="search" action="" method="">
        <div class="search-inputbox search-inputbox-2 d-flex flex-row">
          <input type="text" name="search" id="search-input-2" class="search-input search-input-2  tm-bg-black-shadow" placeholder="Search for a service..." autocomplete="off">
        </div>
      </form>
    </div>
    <div class="right-nav-2-item">
      <a class="" href="./" style="text-decoration: none;">
        <i class="fa fa-home" aria-hidden="true"></i>
        Home
      </a>
      <a class="" href="./products.php">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Products
      </a>
      <a class="" href="#">
        <i class="fa fa-blog" aria-hidden="true"></i>
        Blog
      </a>
      <a class="" href="#">
        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
        Contact Us
      </a>
      <a class="" href="./user-login.php">
        <i class="fa fa-user" aria-hidden="true"></i>
        Log In
      </a>
    </div>
  </div>

  <!-- Search Result for top-nav -->
  <div class="search-result"></div>

  <!-- Search Result for top-nav -->
  <div class="search-result-2">
    <ul class="search-list-2">
      <li class="search-listitem-2">hello1</li>
      <li class="search-listitem-2">hello2</li>
      <li class="search-listitem-2">hello3</li>
      <li class="search-listitem-2">hello4</li>
    </ul>
  </div>

  <!-- Service Box -->
  <?php

  $service_catagory = mysqli_query($conn, "SELECT `service_type`,`logo` FROM `service_catagory`;");

  ?>

  <!-- Mobile service box -->
  <div class="service-box tm-bg-gray mobile-service">
    <div class="container" style="background-color: white;">
      <div class="row justify-content-center">
        <?php

        while ($row = mysqli_fetch_assoc($service_catagory)) {

        ?>
          <div class="col text-center unselectable m-service-type" style="max-width: 160px;max-width:max-content;" data-type="<?php echo $row['service_type']; ?>">
            <i><img src="./<?php echo $row['logo'] ?>" height="50px" width="50px" /></i><br>
            <p style=""><?php echo $row['service_type']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Service box -->

  <?php

  $service = mysqli_query($conn, "SELECT `service_type`,`logo` FROM `service_catagory`;");

  ?>

  <div class="service-box tm-bg-gray desktop">
    <div class="container" style="background-color: white;">
      <div class="row justify-content-center">
        <?php

        while ($row = mysqli_fetch_assoc($service)) {

        ?>
          <div class="col text-center unselectable service-type" style="max-width: 160px;max-width:max-content;" data-type="<?php echo $row['service_type']; ?>">
            <i><img src="./<?php echo $row['logo'] ?>" height="50px" width="50px" /></i><br>
            <p style="width:100%"><?php echo $row['service_type']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Youtube Triangle -->

  <div class="tm-section-2-box">
    <div class="tm-section-2">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <h2 class="tm-section-title">We are here to help you?</h2>
            <p class="tm-color-white tm-section-subtitle">Subscribe to get our Youtube Channel</p>
            <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe </a>
          </div>
        </div>
      </div>
    </div>
    <div class="tm-section tm-position-relative" style="min-height: 20px;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
        <polygon fill="#ff4000" points="0,0  100,0  50,60"></polygon>
      </svg>
    </div>
  </div>

  <!-- 3th part -->

  <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
    <div class="container">
      <div class="row product-head">Our Products</div>
      <div class="row" style="justify-content: center;">

        <div class="card-deck">
          <?php
          $products = mysqli_query($conn, "SELECT `id`,`name`,`describtion`,`price`  FROM `products` WHERE `products`.`special`=1;");

          if (mysqli_num_rows($products) > 0) {
            while ($product =  mysqli_fetch_assoc($products)) {
              $product_id = $product["id"];
              $images = mysqli_query($conn, "SELECT `image` FROM product_image WHERE `product_id`=$product_id")
          ?>

              <div class="card" style="width: 350px;">
                <div id="<?php echo "product" . $product_id; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                  <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < mysqli_num_rows($images); $i++) {
                      if ($i == 0) { ?>

                        <li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>' class=" active "></li>

                      <?php } else { ?>

                        <li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>'></li>

                    <?php }
                    } ?>
                  </ol>
                  <div class="carousel-inner">

                    <?php $flag = false;
                    while ($image = mysqli_fetch_assoc($images)) {
                      if (!$flag) { ?>

                        <div class="carousel-item active">
                          <img class="d-block w-100 product_images" src="uploads/<?php echo $image['image']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>

                      <?php $flag = true;
                      } else { ?>

                        <div class="carousel-item">
                          <img class="d-block w-100 product_images" src="uploads/<?php echo $image['image']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>

                    <?php }
                    } ?>

                  </div>
                  <a class="carousel-control-prev" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <div class="card-body">
                  <h4 class="card-title"><?php echo $product["name"] ?></h4>
                  <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                  <p class="card-text"><?php echo $product["describtion"] ?></p>

                  <div class="buy d-flex justify-content-between align-items-center">
                    <div class="price text-success">
                      <h5 class="mt-4">Price: &#8377 <?php echo $product["price"] ?>.00</h5>
                    </div>
                    <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Buy Now </a>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<div class='card'><div class='card-body' style='text-align:center; background:antiquewhite;font-size:initial;'>Coming Soon!</div></div>";
          }
          ?>
        </div>


        <!-- sideBar -->
        <div class="sidebar unselectable" id="mySidebar">
          <div class="sidebar-title">
            <a href="javascript:void(0)" class="closesidebar"><i class="fa fa-times"></i></a>
            <h5>
              <span class="sidebar-title-text"></span>
            </h5>
          </div>
          <div class="sidebar-content">
            <div class="sidebar-component">
              <a href="booking.php?service=<?php echo strtok($type, ' ') . ' ' . $row['s_name']; ?>&type=<?php echo $type; ?>">
                <h5 style="color: black;">
                  testing
                </h5>
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Sidebar -->
  <div class="m-service-sidebar unselectable" id="mySidebar">
    <div class="m-service-sidebar-title">
      <h5>
        <a href="javascript:void(0)" class="closesidebar m-service-closesidebar"><i class="fa fa-times"></i></a>
        <span class="m-sidebar-title-text"></span>
      </h5>
    </div>
    <div class="m-sidebar-content"></div>
  </div>

  <!-- offer slider -->
  <div class="container offer-container">
    <div class="offer-head">Best Services</div>
    <div id="offer-carousel" class="owl-carousel owl-theme">
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
      <div class="item"><img src="img/img-05.jpg"></div>
    </div>
  </div>

  <!-- contact us -->

  <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
    <div class="container ie-h-align-center-fix">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
          <div id="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.02717001608!2d88.49044261496242!3d22.72723148510337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f8a3d136bb59b3%3A0x4451db2120c2fda0!2sParkplace%20Solution!5e0!3m2!1sen!2sin!4v1628686084758!5m2!1sen!2sin" width="100%" height="74%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
            </iframe>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
          <div class="tm-bg-white tm-p-4" style="height: 345px  ;">
            <form action="contact.php" method="post" class="contact-form" id="contact">
              <div class="form-group">
                <input type="text" id="contact_name" class="form-control" placeholder="Name" required />
              </div>
              <div class="form-group">
                <input type="email" id="contact_email" class="form-control" placeholder="Email" required />
              </div>
              <div class="form-group">
                <input type="text" id="contact_subject" class="form-control" placeholder="Subject" required />
              </div>
              <div class="form-group">
                <textarea id="contact_message" name="contact_message" class="form-control" rows="2" placeholder="Message" required></textarea>
              </div>
              <button type="button" class="btn btn-primary tm-btn-primary contact-button">Send Message Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- alert modal -->
  <button type="button" class="btn btn-primary alert-modal d-none" data-toggle="modal" data-target="#alert_modal">Small modal</button>

  <!-- Modal -->
  <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">ALERT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body alert-modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->

  <footer class="tm-bg-dark-blue">
    <div class="container">
      <div class="row">
        <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
          Copyright &copy; <span class="tm-current-year">2021</span> Parkplace Solution</p>
      </div>
    </div>
  </footer>

</body>

</html>