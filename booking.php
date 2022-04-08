<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="">

  <title>Book service</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
  <link rel="stylesheet" href="css/tooplate-style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <style type="text/css">
    :root {
      --placeholder: black;
      --lenght: 0;
    }

    body {
      margin: 0;
      border: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .unselectable {
      -webkit-user-select: none;
      /* Safari */
      -ms-user-select: none;
      /* IE 10 and IE 11 */
      user-select: none;
      /* Standard syntax */
    }

    .top-nav {
      height: 60px;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.2);
      position: absolute;
      z-index: 3;
      top: 0;
      color: white;
      font-size: 2rem;
      font-weight: bold;
      box-sizing: border-box;
      display: flex;
      flex-direction: row;
    }

    .top-nav .container {
      max-width: 100%;
    }

    .top-nav a {
      color: #ffffff;
      text-decoration: none;
      cursor: pointer;
    }

    .navbar-brand.col {
      margin-top: 5px;
      font-family: 'Kirang Haerang', cursive;
      font-size: 30px;
      text-decoration: none;
      color: rgb(255, 255, 255);
    }

    .navbar-brand-2 {
      margin-top: 5px;
      font-family: 'Kirang Haerang', cursive;
      font-size: 30px;
      text-decoration: none;
      color: black !important;
    }

    .navbar-brand.col img {
      margin-bottom: 5px;
    }

    .search {
      display: flex;
      flex-direction: row;
      width: 100%;
      height: 100%;
      justify-content: center;
    }

    .search-box {
      max-width: 480px;
      width: 480px;
      height: 100%;
      margin-left: 10px;
      margin-top: 16px;
      position: relative;
    }

    .search-input {
      height: 35px;
      width: 20rem;
      padding-left: 10px;
      border-bottom-left-radius: 5px;
      border-top-left-radius: 5px;
      font-size: 16px;
    }

    .search-button {
      width: 35px;
      height: 35px;
      right: 24px;
      background: dodgerblue;
      top: 10px;
      cursor: pointer;
      color: #fff;
      font-size: 24px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .right-nav-item {
      font-size: 17px;
      margin-top: 22px;
      margin-right: 15px;
      min-width: 171px;
      text-align: center;
    }

    i.right-nav-item {
      font-size: 1rem;
    }

    .signup {
      display: block;
    }

    .dropdown {
      width: 145px;
    }

    .dropdown .dropdown-button {
      border: none;
      outline: none;
      color: white;
      background-color: transparent;
      font-size: 18px;
      font-weight: 600;
      position: relative;
    }

    .dropdown-button .fa-sort-desc {
      display: block;
      position: absolute;
      right: -20px;
      top: 4px;
    }

    .dropdown-button .fa-sort-asc {
      display: none;
      position: absolute;
      right: -20px;
      top: 12px;
    }

    .dropdown-button:hover .fa-sort-desc {
      display: none;
    }

    .dropdown-button:hover .fa-sort-asc {
      display: block;
    }

    .dropdown-content {
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      height: 0;
      overflow: hidden;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 10;
      transition: all 0.6s ease-in-out;
      border-radius: 15px;
      font-size: 17px;
      font-weight: 400;
    }

    .dropdown-content a {
      display: block;
      color: black;
      padding: 12px 16px;
      float: none;
      text-align: center;
      text-decoration: none;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      border-bottom: 1px solid #ddd;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      height: 203px;
    }

    .more-signup {
      display: none !important;
    }

    .main-content {
      width: 100%;
      height: auto;
      /* position: absolute; */
      top: 0px;
      background-color: #f1f5f9;
    }

    .banner {
      /*background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('./img/bg-img-1.jpg'); */
      background-image: url('./img/bg-img-1.jpg');
      background-size: 100%;
      background-repeat: no-repeat;
      width: 105vw;
      height: 100vh;
      box-sizing: border-box;
    }

    .banner article {
      margin: 100px auto;
    }

    .banner article h2 {
      color: #ffffff;
      font-weight: 600;
      padding-top: 1em;
      font-size: 40px;
      margin: 0 1em;
    }

    ul.points {
      list-style-position: outside;
      color: #dddddd;
      padding-left: 180px;
      font-size: 20px;
      margin-top: 30px;
    }

    ul.points li {
      margin-bottom: 30px;
    }

    ul.points,
    .points h6 {
      font-size: 30px;
    }

    .booking-container {
      background: #fff;
      background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B);
      background: linear-gradient(to bottom, 60% #FF416C, #FF4B2B);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: black;
      width: 60%;
      min-height: 15rem;
      margin: 0 auto;
      overflow-y: auto;
    }

    .left-section {
      width: 70%;
      height: 100%;
    }

    .right-section {
      width: 30%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
    }

    .booking-box {
      width: 315px;
      height: 310px;
      background-image: linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%);
      color: white;
      border-radius: 10px;
      padding: 5px;
      position: relative;
    }

    .booking-box h3 {
      font-size: 20px;
      font-weight: 600;
      margin-left: 10px;
      margin-top: 8px;
    }

    .selecter-container {
      width: 95%;
      height: 60px;
      /* background-color: white; */
      color: black;
      font-size: 16px;
      margin: 15px auto;
      border-radius: 7px;
    }

    .selecter-container label {
      color: white;
    }

    .selecter {
      height: 100%;
      width: 100%;
      background: inherit;
      padding: 0px !important;
      margin-left: 10px;
    }

    .selecter option {
      background: white;
      cursor: pointer;
    }

    .selecter option:hover {
      background: rgba(0, 0, 0, 0.5) !important;
    }

    .cost-wrapper {
      width: 95%;
      margin: 15px auto;
      height: 60px;
      font-size: 16px;
    }

    .cost-container {
      width: 100%;
      height: 30px;
      background-color: white;
      color: rgba(0, 0, 0, 0.8);
      font-size: 16px;
      padding: 3px 0 0 15px;
      border-radius: 4px;
    }

    .booking-box button {
      width: 90px;
      height: 30px;
      background-color: white;
      color: #DF17E0;
      font-size: 14px;
      font-weight: 700;
      border-radius: 7px;
      margin: 18px 0 0 0px;
      cursor: pointer;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    .single-input {
      margin: 30px 12px;
    }

    .input-field {
      width: 100%;
      padding: 10px 20px;
      border: 2px solid #868e96;
      font-size: 1.2em;
      outline: none;
      background: #fff;
      border-radius: 5px;
      color: black;
      position: relative;
      transition: 0.4s;
    }

    select {
      background: #ddd;
    }

    .input-label {
      color: var(--placeholder);
      font-size: 1.2em;
      position: absolute;
      margin: 10px 20px;
    }

    .input-label-col {
      position: absolute;
      color: var(--placeholder);
      font-size: 1.2em;
      left: 32px;
      top: 10px;
    }

    .input-label,
    .input-label-col {
      transform: translateY(var(--lenght));
      transition: 0.4s ease-in-out;
      padding: 0 2px;
    }

    .input-field:focus {
      border-color: red;
      --lenght: -25px;
    }

    .input-field:focus+.input-label {
      color: red;
      --lenght: -25px;
      background-color: white;
    }

    .input-field:focus+.input-label-col {
      color: red;
      --lenght: -25px;
      background-color: white;
    }

    .book-button {
      height: 30px;
      width: 90px;
      background: #10a7e5;
      color: white;
      font-weight: 600;
      border-radius: 15px;
      margin: 20px 44%;
      margin-bottom: 80px;
      cursor: pointer;
      font-size: 15px;
    }

    .book-button:hover {
      transform: scale(1.2);
      box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.4);
    }


    .ml10 {
      position: relative;
      font-weight: 900;
      font-size: 4em;
    }

    .ml10 .text-wrapper {
      position: relative;
      display: inline-block;
      padding-top: 0.2em;
      padding-right: 0.05em;
      padding-bottom: 0.1em;
      overflow: hidden;
    }

    .ml10 .letter {
      display: inline-block;
      line-height: 1em;
      transform-origin: 0 0;
    }

    .bg-black-shadow {
      background-color: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));
    }

    /* mobile view */
    .m-banner {
      position: absolute;
      z-index: 1;
      padding: 0;
      height: 100%;
      display: none;
    }

    .m-brand-container {
      text-align: left;
      margin: 0px auto;
      padding-top: 10px;
      padding-bottom: 5px;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.2);
    }

    .m-brand {
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      padding-left: 0;
    }

    .m-brand:hover {
      color: white;
    }

    .m-brand img {
      border-radius: 5px;
    }

    .m-nevigation {
      color: white;
      font-size: 20px;
      margin: 5px;
      cursor: pointer;
      float: right;
    }

    .m-place-select {
      margin-right: 0;
      cursor: pointer;
      font-size: 15px;
    }

    .m-select-box {
      background-color: #fff;
      position: relative;
      font-family: Arial;
      height: 33px;
      border-radius: 5px;
    }

    .m-select-box i {
      position: absolute;
      right: 5px;
      top: 7px;
      color: black;
    }

    .m-search {
      /* display: flex;
        flex-direction: row; */
      width: 100%;
      height: 100%;
      justify-content: center;

    }

    .m-search-box {
      height: 100%;
      margin-left: 15px;
      margin-right: 0px;
      margin-top: 56px;
      position: relative;
    }

    .m-search-input {
      height: 33px;
      width: 0;
      padding-left: 10px;
      border-radius: 5px;
      font-size: 14px;
      outline: none;
    }

    .m-sidebar {
      background-color: #ddd;
      width: 300px;
      min-height: 50rem;
      position: fixed;
      top: 0;
      left: -325px;
      z-index: 4;
      transition: all 0.4s ease-in-out;
      overflow: hidden;
      box-shadow: 15px 0 20px 0px rgba(0, 0, 0, 0.2);
      z-index: 3;
      border: 4px solid #027580;
    }

    .m-sidebar-title {
      height: 6.6%;
      min-width: 20px;
      background-color: #027580;
      border-bottom: 1px solid #ddd;
      box-sizing: border-box;
      color: black;
      padding: 20px 20px 20px 5px;
    }

    .m-sidebar-content {
      background-color: #fff;
      /* #042331 */
      min-width: 100%;
      height: 46.8rem;
      overflow-y: auto;
    }

    .m-sidebar-component {
      min-width: 100%;
      width: 100%;
      height: 9%;
      box-sizing: border-box;
      padding-top: 20px;
      padding-left: 20px;
      padding-right: 10px;
      padding-bottom: 10px;
      color: black;
      border-top: 1px solid rgba(255, 255, 255, .1);
      border-bottom: 1px solid #ddd;
      cursor: pointer;
      position: relative;
    }

    .m-sidebar-component h5 {
      transition: 0.8s;
      font-size: 17px;
      font-weight: 400;
      padding-left: 20px;
    }

    .m-sidebar-component h5 i {
      font-size: 15px;
      position: absolute;
      left: 10px;
      top: 25px;
      color: #027580;
    }

    .m-sidebar-component:hover {
      background: rgba(0, 0, 0, 0.2);
    }

    .m-sidebar-title h5 {
      cursor: default;
    }

    .m-closesidebar {
      color: white;
      font-size: 25px;
      font-weight: 600;
      cursor: pointer;
      position: absolute;
      right: 20px;
      top: 19px;
    }

    .m-closesidebar:hover {
      color: black;
    }

    .m-banner-msg {
      height: 45px;
      margin-top: 35px;
      justify-content: center;
      outline: none;
    }

    .m-signin-btn {
      width: 70px;
      height: 28px;
      border-radius: 15px;
      font-size: 14px;
      font-weight: 500;
      margin-top: 9px;
      background: white;
      outline: none !important;
      cursor: pointer;
    }

    .m-user-welcome {
      width: auto;
      height: 28px;
      padding: 5px 10px;
      font-size: 17px;
      font-weight: 600;
      color: white;
      outline: none;
      display: none;
    }


    /* .right-nav-container {} */

    @media all and (max-width: 500px) {

      :root {
        --triangle_scroll: 500;
      }

      .banner-container {
        height: 240px;
        background: linear-gradient(to bottom, #027580 50%, #12717d 10%, #17a6b3);
        z-index: 0;
      }

      .banner-container .banner-carousel {
        display: none;
      }

      .banner-container .m-banner-carousel {
        display: block;
        z-index: 0;
      }

      .m-banner {
        display: block;
      }

      .top-nav {
        display: none;
      }

      .tm-section-2-box {
        transition: all 1s ease-in-out;
      }

      .banner {
        height: 60vh;
        background-size: 100%;
        background-repeat: no-repeat;
        /* background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)),url('./image/mobile-repair.jpg'); */
      }

      .left-section {
        width: 100%;
        height: 50%;
      }

      .banner article h2 {
        font-size: 23px;
        margin-left: 40px;
        filter: brightness(1);
      }

      ul.points {
        font-size: 5px;
        padding-left: 4em;
        margin-top: 20px;
        filter: brightness(1);
      }

      ul.points li {
        margin-bottom: 20px;
        font-weight: 600;
      }

      ul.points,
      .points h6 {
        font-size: 20px;
      }

      .right-section {
        width: 100%;
        height: 90%;
        position: relative;
      }

      .booking-box {
        width: 85vw;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 180px;
        z-index: 10;
      }
    }
  </style>
</head>

<body>
  <!-- Mobile Banner -->

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
    <div class="m-search-box row d-none">
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
    </div>
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

  <!-- top-nav -->
  <div class="top-nav">
    <div class="container">
      <div class="row justify-content-around">
        <a class="navbar-brand col" href="./">
          <img src="image/logo.png" height="30px" width="30px" style="border-radius: 10px;">
          Parkplace Solution
        </a>
        <div class="search-box col justify-content-center">
          <form class="search" action="" method="">
            <div class="place-select">

            </div>
            <div class="search-inputbox d-flex flex-row">
              <input type="text" name="search" class="search-input  tm-bg-black-shadow" placeholder="Search for a service...">
              <button type="button" class="search-button search-btn">
                <i class="fa fa-search search-btn"></i>
              </button>
            </div>
          </form>
        </div>
        <div class="right-nav-container d-flex flex-row justify-content-around">
          <a class="right-nav-item col-2 col-md-2 " href="./" style="min-width: 243px">
            <i class="fa fa-home" aria-hidden="true"></i>
            Home
          </a>
          <a class="right-nav-item col signup" href="./user-login.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            Sign up/sign in
          </a>
          <div class="right-nav-item">
            <div class="dropdown col">
              <button class="dropdown-button">
                More
                <i class="fa fa-sort-desc"></i>
                <i class="fa fa-sort-asc"></i>
              </button>
              <div class="dropdown-content" id="dropdown-content">
                <a class="more-signup" href="user-login.php">Sign up/sign in</a>
                <a href="logout.php">Home</a>
                <a href="seller-account-info.php">Blog</a>
                <a href="login-info.php">Contact us</a>
                <a href="seller-info.php">Log out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  $city = mysqli_query($conn, "SELECT `city` FROM `city`;");
  ?>

  <section class="main-content">
    <div class="row banner bg-black-shadow">
      <div class="left-section">
        <article>
          <h2 class="ml10 unselectable">
            <span class="text-wrapper">
              <span class="letters">Best <?php echo ucwords($_GET['service']); ?> Service in Barasat</span>
            </span>
          </h2>
          <ul class="points unselectable">
            <li>
              <h6>Doorstep repair within 60 mins</h6>
            </li>
            <li>
              <h6>30 day post-repair guarantee</h6>
            </li>
          </ul>
        </article>
      </div>
      <div class="right-section">
        <div class="booking-box">
          <!-- <h3>Service Charge:</h3> -->
          <div class="town-selecter-container selecter-container">
            <label for="os-selecter">Select Address:</label>
            <select class="town-selecter selecter" name="state">
              <?php
              while ($row = mysqli_fetch_assoc($city)) {
              ?>
                <option value="<?php echo $row['city']; ?>"><?php echo strtoupper($row['city']); ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="os-selecter-container selecter-container">
            <label for="os-selecter">Select OS:</label>
            <select class="os-selecter selecter" name="state">
              <option value="Windows_7" selected>WINDOWS 7</option>
              <option value="Windows_8">WINDOWS 8/8.1</option>
              <option value="Windows_10">WINDOWS 10</option>
            </select>
          </div>
          <div class="cost-wrapper">
            <label for="os-selecter">Service Cost:</label>
            <div class="cost-container">
              ₹<span class="cost"></span>
            </div>
          </div>
          <button type="submit" class="book-btn" data-toggle="modal" data-target="#exampleModalScrollable">Book Now</button>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
      Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle"><?php echo ucwords($_GET['service']); ?> Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" placeholder="10-Digit Phone Number">
              </div>
              <div class="form-group">
                <input type="button" style="background-color: dodgerblue; color: white; cursor:pointer" class="form-control" id="send-otp-button" value="Send Otp">
              </div>
              <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" class="form-control" id="otp" placeholder="Enter Otp">
              </div>
              <div class="form-group">
                <input type="button" style="background-color: dodgerblue; color: white; cursor:pointer" class="form-control" id="continue-button" value="Continue">
              </div>
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control disable" id="name" placeholder="Enter Full Name">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput3">Email Address</label>
                <input type="email" class="form-control disable" id="email" placeholder="name@example.com" disabled>
              </div>
              <div class="form-group">
                <label for="building">Flat, House no., Building, Company, Apartment</label>
                <input type="text" class="form-control disable" id="building" placeholder="">
              </div>
              <div class="form-group">
                <label for="area">Area, Colony, Street, Sector, Village</label>
                <input type="text" class="form-control disable" id="area" placeholder="">
              </div>
              <div class="form-group">
                <label for="landmark">Landmark</label>
                <input type="text" class="form-control disable" id="landmark" placeholder="E..g. Near Flyover, Behind Regal Cinema, etc.">
              </div>
              <div class="form-group">
                <label for="pin-code">Pin Code</label>
                <input type="text" class="form-control disable" id="pin-code" placeholder="6 Digits [0-9] PIN Code">
              </div>
              <div class="form-group">
                <?php
                $city_select = mysqli_query($conn, "SELECT `city` FROM `city`;");
                ?>
                <label for="city-select"></label>
                <select class="form-control disable" id="city-select">
                  <?php
                  while ($row = mysqli_fetch_assoc($city_select)) {
                  ?>
                    <option value="<?php echo $row['city']; ?>"><?php echo strtoupper($row['city']); ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="time-slot">Time Slot</label>
                <select class="form-control" id="time-slot">
                  <option value="10am-11am">10AM - 11Am</option>
                  <option value="11am-12pm">11AM - 12pm</option>
                  <option value="12pm-01pm">12PM - 01PM</option>
                  <option value="02pm-03pm">02PM - 03PM</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">BOOK</button>
          </div>
        </div>
      </div>
    </div>

  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml10 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({
        loop: true
      })
      .add({
        targets: '.ml10 .letter',
        rotateY: [-90, 0],
        duration: 1300,
        delay: (el, i) => 45 * i
      }).add({
        targets: '.ml10',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
      });

    $('.selecter').select2();

    $(document).ready(function() {

      let params = (new URL(window.location.href)).searchParams;
      let type = params.get('type');

      if (screen.width >= 409) {
        $('.banner').css('background-image', "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)),url('./image/" + type + ".jpg')");
      }

      if (screen.width <= 408) {
        $('.banner').css('background-image', "linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.5)),url('./image/m-" + type + ".jpg')");
      }

      $(".disable").prop('disabled', true);

      let city = $('.town-selecter').val();
      let os = $('.os-selecter').val();
      $.ajax({
        url: './api/booking/booking-ajax-cost.php',
        type: 'POST',
        data: {
          city: city,
          os: os
        },

        success: function(data) {
          if (data != 0) {
            $('.cost').html(data);
          } else {
            alert("Failed! Try again");
          }
        }
      })

      $('.town-selecter').change(function() {
        let city = $('.town-selecter').val();
        let os = $('.os-selecter').val();

        $.ajax({
          url: './api/booking/booking-ajax-cost.php',
          type: 'POST',
          data: {
            city: city,
            os: os
          },

          success: function(data) {
            if (data != 0) {
              $('.cost').html(data);
            } else {
              alert("Failed! Try again");
            }
          }
        })
      })
      $('.os-selecter').change(function() {
        let city = $('.town-selecter').val();
        let os = $('.os-selecter').val();

        $.ajax({
          url: './api/booking/booking-ajax-cost.php',
          type: 'POST',
          data: {
            city: city,
            os: os
          },

          success: function(data) {
            if (data != 0) {
              $('.cost').html(data);
            } else {
              alert("Failed! Try again");
            }
          }
        })
      })
    })
  </script>
</body>

</html>