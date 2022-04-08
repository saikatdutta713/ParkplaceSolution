<?php
session_start();
if($_SESSION['admin_logged_in']){
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="">
  <title>ParkplaceSolution - Admin panel</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style type="text/css">

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    :root {

      --sidebarwidth :250px;

      font-size: 10px;
      width: 100px;
    }

    * {
      border: 0;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100%;
      width: 100%;
    }

    .unselectable  {
      -webkit-user-select: none; /* Safari */
      -ms-user-select: none; /* IE 10 and IE 11 */
      user-select: none; /* Standard syntax */
    }

    .sidebar {
      width: var(--sidebarwidth);
      height: 100%;
      background-color: #027580;
      color: white;
      font-weight: 400;
      transition: 0.5s all ease-in-out;
      font-size: 1.6rem;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 2;
      overflow: hidden;
    }

    .sidebar a {
      text-decoration: none;
      color: #fff;
    }

    .navbar-brand {
      font-size: 1.8rem;
      font-weight: 700;
    }

    .sidebar-content {
      padding: 1rem 1rem;
    }

    .side-item {
      min-width:250px;
      cursor: pointer;
      padding: 1.5rem 1rem;
      font-size: 1.7rem;
    }

    .sidebar .side-item:hover {
      font-weight: 600;
      background-color: rgba(0, 0, 0, .2);
    }

    .notification-count {
      height: 25px;
      min-width: 25px;
      max-width: 40px;
      border-radius: 30px;
      margin-left: 2rem;
      margin-top: 4px;
      padding: 0 5px;
      background-color: red;
      font-weight: 400;
      font-size: 1.5rem;
      text-align: center;
    }

    .main-content {
      height: 100%;
      width: calc(100% - var(--sidebarwidth));
      position: fixed;
      top: 0;
      right: 0;
      background-color: #f1f5f9;
      transition: 0.5s all ease-in-out;
    }

    .main {
      width: 100%;
      height: 100%;
      position: absolute;
    }

    .main .sidebar-toggle {
      position: absolute;
      left: 20px;
      top: -18px;
      cursor: pointer;
    }

    .sidebar-toggle i {
      padding: 5px;
      border-radius: 5px;
      font-size: 2.3rem;
      color: #9f9f9f;
      margin-top: 34px;
      margin-right: 14px;
    }

    .sidebar-toggle i:hover {
      border: 3px solid #9f9f9f;
    }

    .main .container {
      height: auto;
      width: 100%;
      margin-top: 40px;
      border-radius: 15px;
      display: flex;
      justify-content: center;
    }

    .row-1 {
      margin-top: 9%;
    }

    .main .home-card {
      width: 350px;
      height: 350px;
      margin: 30px 10px;
      display: flex;
      flex-direction: row;
      color: #1d2231;
      border-radius: 15px;
      box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .main .home-card-content {
      height: 100%;
      width: 100%;
      background-color: #fff;
      border-bottom-right-radius: 15px;
      border-top-right-radius: 15px;
      border-radius: 15px;
    }

    .row-1 .card-header {
      font-size: 1.6rem;
        font-weight: bold;
        color: #908484;
    }

    .single-input i {
      font-size: 2.3rem;
      color: #9f9f9f;
      position: absolute;
      top: 12px;
    }

    .input-group{
      width: 95%;
      font-size: 17px;
      position: absolute;
      transition: all 0.6s ease-in-out;
    }

    .n-edit {
      transform: translateX(-100%);
    }

    .otp-box {
      transform: translateX(100%);
      padding-top: 35px;
    }

    .single-input {
      margin: 30px 12px;
      position: relative;
    }

    .input-field{
      width: 100%;
      padding: 10px 40px;
      border-bottom: 1px solid #ff105f;
      outline: none;
      background: transparent;
      }

    .submit-button{
      margin: 35px auto;
      width: 80%;
      height: 30px;
      position: relative;
      border-radius: 30px;
      background: linear-gradient(to right, #027580,#169daa);
      color: white;
      cursor: pointer;
    }

      

        @media screen and (max-width: 992px) {
            
            .row-1 {
              margin-top: 5%;
                
            }
        }

        @media screen and (max-width: 600px) {
            
            .card-body {
              padding: 0;
            }

            .main .home-card-content {
              width: 100%;
            }

            .card-text {
              margin-left: 0;
            }
        }

    @media screen and (max-width: 441px) {

            .main-content {
              overflow-x: auto;
              overflow-y: auto;
            }
            
            .main .home-card {
              margin: 30px 2%;
            }
        }
*/
  </style>
</head>
<body>

    <?php include "./admin-sidebar.php"; ?>

  <div class="main-content">
    <div class="main">
      <div class="sidebar-toggle unselectable">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="container">
        <div class="row row-1 d-flex justify-content-center unselectable">
          <div class="col">
            <div class="total-booking home-card">
              <div class="home-card-content card">
                <div class="card-body">
                  <!-- Non Edited Input form -->
                  <div class="input-group d-flex flex-column edit">
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <div class="input-field">saikatdutta713@gmail.com</div>
                    </span>
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-key" aria-hidden="true"></i>
                      <div class="input-field">**********</div>
                    </span>
                    <button class="submit-button submit-button-edit">Edit</button>
                  </div>
                  <!-- Edited input form -->
                  <div class="input-group d-flex flex-column n-edit">
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <input type="text" class="input-field user-id" name="user-id" placeholder="Enter User Id">
                    </span>
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-key" aria-hidden="true"></i>
                      <input type="password" class="input-field pass" name="password" placeholder="Enter Password">
                    </span>
                    <button type="submit" class="submit-button send-otp-button">Send Otp</button>
                  </div>
                  <!-- Otp Box -->
                  <div class="input-group d-flex flex-column otp-box">
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                      <input type="text" class="input-field otp-input" name="otp-input" placeholder="Enter Otp">
                    </span>
                    <button type="submit" class="submit-button submit-button-otp">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>

  <script type="text/javascript">

    var x = 1;

    $(document).ready(function() {
      $('.sidebar-toggle').on('click', function(){
        if (x%2!=0) {
          $(':root').css('--sidebarwidth', '0px');
        }else {
          console.log('else');
          $(':root').css('--sidebarwidth', '250px');
        }

        x++;

      })

      // edit button handle
      $('.submit-button-edit').click(function(event) {
        $('.edit').css('transform','translateX(-100%)');
        $('.n-edit').css('transform','translateX(0)');
      });

      // Save button handle
      $('.send-otp-button').click(function(event) {
        let user_id = $('.user-id').val();
        let pass = $('.pass').val();
        let otp = Math.floor(Math.random() * (1000000 - 100000)) + 15;

        if(user_id == ""){
          alert('Please enter Your mail id!');
        }
        else if(pass == ""){
          alert("Please enter password!");
        }
        else {
          $.ajax({
            url: 'otp.php',
            type: 'POST',
            data: {otp: otp},

            success: function(data){
              if (data == 1) {
                $('.n-edit').css('transform','translateX(100%)');
                $('.otp-box').css('transform','translateX(0)');
              }
              else {
                alert('Failed to send otp!');
              }
            }
          })
        }
        
      });

      $(document).on('click','.submit-button-otp', function(event) {

          let otp_input = $('.otp-input').val();

          $.ajax({
            url: 'account-update-ajax.php',
            type: 'POST',
            data: {user_id: user_id, pass : pass, otp_input : otp_input},

            success: function(data){

              if (data == 1) {

              }
              else {
                alert("Problem to save! try again");
              }
            }

          })

      });

      // notification count
      notification_count();

    });

  </script>

</body>
</html>
